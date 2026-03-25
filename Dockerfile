FROM alpine:3.23

RUN apk update && \
  apk upgrade --no-cache && \
  apk add --no-cache apache2 php83-apache2 && \
  rm -rf /var/cache/apk/*

RUN rm -f /var/www/localhost/htdocs/index.html && echo "ServerName localhost" >> /etc/apache2/httpd.conf

COPY . /var/www/localhost/htdocs/

EXPOSE 80

CMD ["httpd", "-D", "FOREGROUND"]