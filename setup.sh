#!/bin/bash
export REPO=git@karim-shopper-dk:karimPortfolio/Karim-shopper.git
export PROJECT_NAME=Karim-shopper
export MYSQL_DB_NAME="db_karim_shopper_2025"
export MYSQL_USER="karim_shopper"
export MYSQL_USER_PASSWORD="hagYOkarim--shopper@@2025&&"


# Update the system to the latest version
echo "Updating system..."
sudo yum update -y

# Install Git if not already installed
echo "Checking if Git is installed..."
if ! git --version &>/dev/null; then
  echo "Git is not installed. Installing Git..."
  sudo yum install git -y
else
  echo "Git is already installed."
fi

# Install PHP (7.4 or 8.0) and required extensions
echo "Installing PHP and required extensions..."
sudo yum install -y php8.3 php8.3-cli php8.3-fpm php8.3-common php8.3-mbstring php8.3-zip php8.3-mysqlnd php8.3-xml php8.3-gd php8.3-intl php8.3-bcmath php8.3-ldap php8.3-soap php8.3-opcache
php -v

# Check if PHP is installed
echo "Checking if PHP is installed..."
if ! php -v &>/dev/null; then
  echo "PHP is not installed. Exiting..."
  exit 1
else
  echo "PHP is already installed."
fi

# Install Composer globally
echo "Checking if Composer is installed..."
if ! composer -v &>/dev/null; then
  echo "Composer is not installed. Installing Composer..."
  curl -sS https://getcomposer.org/installer | php
  sudo mv composer.phar /usr/local/bin/composer
  composer -V
else
  echo "Composer is already installed."
fi

# Install MySQL 8.0 repository for Amazon Linux 2
echo "Installing MySQL 8 repository..."
sudo yum localinstall -y https://dev.mysql.com/get/mysql80-community-release-el7-3.noarch.rpm

# Install MySQL 8.0 server
echo "Installing MySQL 8.0 server..."
sudo yum install -y mysql-server

# Start MySQL service
echo "Starting MySQL server..."
sudo systemctl start mysqld
sudo systemctl enable mysqld

# Get the temporary MySQL root password
echo "Getting the MySQL root password..."
MYSQL_ROOT_PASSWORD=$(sudo grep 'temporary password' /var/log/mysqld.log | tail -n 1 | awk '{print $NF}')
echo "Temporary root password: $MYSQL_ROOT_PASSWORD"


# Create a new database and user for Laravel application
echo "Creating Laravel database and user..."
# Connect to MySQL and create database and user
sudo mysql -u root -p"$MYSQL_ROOT_PASSWORD" -e "CREATE DATABASE ${MYSQL_DB_NAME};"
sudo mysql -u root -p"$MYSQL_ROOT_PASSWORD" -e "CREATE USER '${MYSQL_USER}'@'localhost' IDENTIFIED BY '${MYSQL_USER_PASSWORD}';"
sudo mysql -u root -p"$MYSQL_ROOT_PASSWORD" -e "GRANT ALL PRIVILEGES ON ${MYSQL_DB_NAME}.* TO '${MYSQL_USER}'@'localhost';"
sudo mysql -u root -p"$MYSQL_ROOT_PASSWORD" -e "FLUSH PRIVILEGES;"

# Clone the repository
echo "Cloning the repository from $REPO..."
GIT_SSH_COMMAND="ssh -i ~/.ssh/deploy_key" git clone "$REPO"

# Navigate into the project folder
echo "navigating to $project_name"
cd "$project_name" || { echo "Failed to enter directory $project_name"; exit 1; }

# Install Laravel dependencies using Composer
echo "Installing Laravel dependencies..."
composer install

# Install NPM dependencies
echo "Installing NPM dependencies..."
npm install

# Set up the .env file
echo "Setting up the .env file..."
cp .env.example .env

# Generate the Laravel application key
echo "Generating application key..."
php artisan key:generate

# Run the database migrations
echo "Running database migrations..."
php artisan migrate

# Provide further instructions
echo "Congrats! now you're live."