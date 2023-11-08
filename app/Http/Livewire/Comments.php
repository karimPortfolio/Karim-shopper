<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Report;
use App\Models\User;
use App\Notifications\Warnings;
use Livewire\Component;
use App\Notifications\newComment;
use App\Notifications\newLike;
use Illuminate\Support\Facades\Notification;

class Comments extends Component
{

    public $product, $product_id ,$comment, $report_type, $report_msg;

    public function mount($product)
    {
        $this->product = $product;
        $this->product_id = $product[0]->id;
    }

    public function checkAuth($id)
    {
        if (!isset(auth()->user()->id)) {
            return redirect()->route("products.details", $id)->with('failed', "You can't post a comment until you log in.");
        }
    }

    public function handleSubmit($id)
    {
        $this->validate([
            'comment' => 'required'
        ]);
        $comment = Comment::create([
            'content' => $this->comment,
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ]);
        $product = Product::where('id', $id)->first();
        $user = User::where('id', $product->user_id)->first();
        Notification::send($user, new newComment($comment));
        return redirect()->route('products.details', $id);
    }

    public function handleLikeBtn($id)
    {
        if (isset(auth()->user()->id)) {
            $likes = Like::where('user_id', auth()->user()->id)->where('comment_id', $id)->count();
            if ($likes === 0)
            {
                $newLike = Like::create([
                    'user_id' => auth()->user()->id,
                    'comment_id' => $id,
                ]);
                $comment = Comment::where('id', $id)->first();
                $user = $comment->user;
                if ($user->id !== auth()->user()->id)
                {
                    Notification::send($user, new newLike($comment, $newLike));
                }
            }
            else
            {
                Like::where('user_id', auth()->user()->id)->where('comment_id', $id)->delete();
                return redirect()->route("products.details", $this->product_id);
            }
        }
        else
        {
            return redirect()->route("products.details", $this->product_id)->with('failed', "You can't like a comment until you log in.");
        }
        return redirect()->route('products.details', $this->product_id);
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back();
    }

    public function handleReportingComment($id)
    {
        $this->validate([
            'report_type' => 'required'
        ]);
        $comment = Comment::where('id', $id)->first();

        $reports_num = Report::where('comment_id', $id)->where('reports_type', $this->report_type)->count();
        $reporter_is_same = Report::where('comment_id', $id)->where('reporter', auth()->user()->id)->count();
        $reports_num2 = Report::where('comment_id', $id)->count();
        $user = $comment->user;
        if ($reporter_is_same === 0)
        {
            if ($reports_num >= 5)
            {
                Report::where('comment_id', $id)->delete();
                Comment::findOrFail($id)->delete();
                Notification::send($user, new Warnings($comment, $this->report_type));
            }
            else if ($reports_num2 > 10)
            {
                Report::where('comment_id', $id)->delete();
                Comment::findOrFail($id)->delete();
                Notification::send($user, new Warnings($comment));
            }
            else
            {
                Report::create([
                    'reports_type' => $this->report_type,
                    'comment_id' => $id,
                    'reporter' => auth()->user()->id
                ]);
            }

        }
        return redirect()->route('products.details', $comment->product->id)->with('success','Thanks for reporting this comment');
    }

    public function render()
    {
        $comments = Comment::where('product_id', $this->product_id)->orderBy('created_at', 'desc')->get();
        return view('livewire.comments',
        [
            "product_id" => $this->product_id,
            "comments" => $comments,
        ]
    );
    }
}
