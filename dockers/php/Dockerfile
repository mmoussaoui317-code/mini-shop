FROM php:8.2-fpm
LABEL maintainer="outmani"

RUN mkdir -p /usr/src/php/ext

#Install System Packages
RUN  apt-get update && apt install -y unzip zlib1g-dev libicu-dev libsqlite3-dev sqlite3 libpng-dev libzip-dev wget libxml2-dev

#Install PHP Extensions
RUN  docker-php-ext-install pdo_sqlite pdo_mysql zip pcntl intl gd mysqli zip  bcmath calendar dba exif gettext shmop sockets sysvmsg sysvsem sysvshm soap 

# Install needed php extensions: memcached
RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev libssl-dev \
	&& pecl install memcached \
	&& docker-php-ext-enable memcached


# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp
	
RUN pecl install xhprof \
	&& docker-php-ext-enable xhprof 

# Install needed php extensions: memcache
# RUN apt-get install --no-install-recommends -y unzip libssl-dev libpcre3 libpcre3-dev && \
#     cd /usr/src/php/ext/ && \
#     curl -sSL -o php7.zip https://github.com/websupport-sk/pecl-memcache/archive/NON_BLOCKING_IO_php7.zip && \
#     unzip php7.zip && \
#     mv pecl-memcache-NON_BLOCKING_IO_php7  memcache && \
#     docker-php-ext-configure memcache --with-php-config=/usr/local/bin/php-config && \
#     docker-php-ext-install memcache && \
#     echo "extension=memcache.so" > /usr/local/etc/php/conf.d/ext-memcache.ini && \
#     rm -rf /tmp/pecl-memcache-php7 php7.zip


# Install needed php extensions: bz2 
RUN apt-get install --no-install-recommends -yqq libbz2-dev && \
	docker-php-ext-install bz2

# Install needed php extensions: tidy
RUN apt-get update \
	&& apt-get install -y libmagickwand-dev imagemagick libtidy-dev \
	&& pecl install imagick \
	&& docker-php-ext-enable imagick \
	&& docker-php-ext-install tidy \
	&& docker-php-ext-enable tidy

# Install APCu
RUN pecl install  -o -f apcu \
	&& docker-php-ext-enable apcu

# install xdebug
RUN pecl install -o -f xdebug \
	&& docker-php-ext-enable xdebug
RUN { \
	echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)"; \
	echo "xdebug.mode=debug,develop"; \
	echo "xdebug.start_with_request=yes"; \
	echo "xdebug.client_host=host.docker.internal"; \
	echo "xdebug.discover_client_host=1"; \
	echo "xdebug.output_dir=/var/www/tmp/xdebug"; \
	echo "xdebug.profiler_output_name=xdebug_profile-trace.%R"; \
	echo "xdebug.idekey=VSCODE"; \
	} > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini;

RUN docker-php-ext-configure hash --with-mhash

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm (LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
	apt-get install -y nodejs && \
	npm install -g yarn

RUN apt-get clean -y