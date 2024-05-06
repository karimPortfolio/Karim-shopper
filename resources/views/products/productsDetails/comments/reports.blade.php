
<div wire:ignore.self class="modal fade" id="exampleModalCenter-{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" >
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
              <h4 class="modal-title" id="exampleModalLongTitle">Report {{ $comment->user->name }}'s comment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="reportForm" wire:submit.prevent="handleReportingComment({{ $comment->id }})"  class="w-100">
                <div class="modal-body">
                    <h6>Why are you reporting this comment ?</h6>
                        <select wire:model="report_type" id="report-type" class="form-control mt-3" >
                            <option value="1" selected>It's spam</option>
                            <option value="2">Nudity or sexual activity</option>
                            <option value="3">Hate speech or symbols</option>
                            <option value="4">Violence or dangerous organiizations</option>
                            <option value="5">Sale of illegal or regulated goods</option>
                            <option value="6">Bullying or harassment</option>
                            <option value="7">Intellectual property violation</option>
                            <option value="8">False information</option>
                            <option value="9">Something else</option>
                        </select>
                        <textarea wire:model="report_msg" class="form-control mt-3" id="report-msg" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-target="#exampleModalCenter">Send</button>
                </div>
            </form>
          </div>
        </div>
</div>




