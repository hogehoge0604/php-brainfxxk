FROM php:7.4.1-alpine3.11

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . ./
RUN composer dump-autoload

CMD /bin/sh
