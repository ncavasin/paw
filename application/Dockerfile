FROM php:7.4.19-buster
RUN apt -y update && apt -y upgrade && apt -y install wget unzip
RUN wget -O composer-setup.php https://getcomposer.org/installer
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
WORKDIR /usr/src/app
CMD ["composer", "--version"]