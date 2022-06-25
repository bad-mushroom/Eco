FROM alpine:latest
LABEL Mainainter="Eco (chris@chaoscontrol.org)" \
    Description="A lightweight and efficient php-fpm and Nginx container based on Alpine linux."

# Install core dependencies
RUN apk update && \
    apk upgrade && \
    apk add php8 \
    php8-curl \
    php8-dom \
    php8-fileinfo \
    php8-gd \
    php8-fpm \
    php8-mbstring \
    php8-mysqli \
    php8-opcache \
    php8-pdo_mysql \
    php8-openssl \
    php8-phar \
    php8-pdo \
    php8-session \
    php8-simplexml \
    php8-tokenizer \
    php8-xml \
    php8-xmlwriter \
    nginx \
    curl \
    supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files from your app to WORKDIR root
COPY composer.json composer.lock ./

# Configure supervisord
COPY .build/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy app
COPY . ./

# Set user/group
RUN chown -R nobody.nobody /var/www

# Install composer dependencies
RUN composer install --no-scripts \
    && rm -rf /root/.composer/cache/*

# Optimize Laravel
RUN php artisan optimize

# Cleanup
RUN rm -rf /var/cache/apk/

# Expose NGINX on port 80
EXPOSE 80

# Start Nginx | FPM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
