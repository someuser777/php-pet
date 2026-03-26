# map of project

- [Main Page](/page_main_page.php)
- [Post Editor](/page_post_editor.php)
- [Sign in](/page_sign_in.php)
- [Sign up](/page_sign_up.php)
- [Admin Panel](/page_admin_panel.php)

## Additional info
- There are [tests](https://github.com/daniilmaikovskiy/php-pet-tests) for this project

## how to start

1. docker build -t php-pet .
2. docker run --rm -d --name='php-pet-container' -p 80:80 php-pet
3. check [localhost](http://localhost)

## logs

docker exec php-pet-container tail -f /var/log/apache2/error.log