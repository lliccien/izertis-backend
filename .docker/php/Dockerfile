FROM  php:8.1.1-fpm-buster

RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip nano librabbitmq-dev libssh-dev  libpq-dev libxslt-dev \
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev libsodium-dev\
    && docker-php-ext-install intl pdo_pgsql zip gd xsl sodium \
    && pecl install xdebug \
    && docker-php-ext-enable --ini-name xdebug

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer

RUN wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony && \
    chmod +x /usr/local/bin/symfony

WORKDIR /usr/share/nginx/html
