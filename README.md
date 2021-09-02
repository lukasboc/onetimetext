# About
OneTimeText is a tool designed to help you send sensitive data, such as passwords, without it showing up in chat or email histories. You can simply wrap the text you want to share with someone in a OneTimeText message and send the link. The text you packaged, which is accessible only through this link, can be read only 1x before the message is deleted from system. So you don't need to worry about other people accessing the secret message.

# Install
## Webspace
- Copy project files to installation folder
- run: composer install
- run: npm install
- create .env from .env.example
- navigate to root directory
- run: php artisan migrate

## Local
- Copy project files to installation folder
- run: composer install
- run: npm install
- create .env from .env.example
- navigate to root directory
- run: php artisan serve
- (optional if you want to change sass files) run: npm run watch
- run: php artisan migrate

