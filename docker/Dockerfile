FROM php:8.2-apache

# Étiquettes d'image
LABEL maintainer="Votre Nom <lemperiere.charles@gmail.com>"
LABEL version="1.0"
LABEL description="Image Docker Exsana backend"

# Installation des dépendances nécessaires
RUN apt-get update && apt-get install -y --no-install-recommends \
    locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip acl \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen \
    && locale-gen \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installation de Composer (version globale)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation de Symfony CLI (version globale)
RUN curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Configuration et installation des extensions PHP nécessaires
RUN docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql opcache intl zip calendar dom mbstring gd xsl \
    && pecl install apcu && docker-php-ext-enable apcu

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Répertoire de travail
WORKDIR /var/www/html

# Copie des fichiers du projet
COPY . .

# Copie de vhosts.conf
COPY /vhosts/vhosts.conf /etc/apache2/sites-available/000-default.conf

# Exposition du port 80 pour accéder au site web
EXPOSE 80
