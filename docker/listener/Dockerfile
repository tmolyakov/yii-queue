FROM php:7.4-cli

COPY wait-for-it.sh /usr/bin/wait-for-it
RUN chmod +x /usr/bin/wait-for-it

WORKDIR /var/www
CMD wait-for-it rabbitmq:5672 ; php yii broker/consumer/listen-account-message