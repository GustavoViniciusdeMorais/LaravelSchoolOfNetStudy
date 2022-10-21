FROM nginx:stable-alpine
ADD ./nginx/default.conf /etc/nginx/conf.d/default.conf

RUN apk add openrc

RUN apk --update add gcc make g++ zlib-dev