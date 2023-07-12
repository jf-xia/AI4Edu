# syntax=docker/dockerfile:1
FROM bitnami/php-fpm:8.2.7-debian-11-r5
RUN apt-get update && apt-get install -y \
    autoconf \
    build-essential \
    wget
RUN cd /root \
    && wget https://pecl.php.net/get/redis-5.3.7.tgz \
    && tar xzf redis-5.3.7.tgz && cd redis-5.3.7 \
    && phpize \
    && ./configure \
    && make \
    && make install
RUN echo "extension=redis.so" >> /opt/bitnami/php/etc/php.ini
