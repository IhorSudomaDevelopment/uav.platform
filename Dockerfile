FROM ubuntu:22.04

RUN apt-get update && apt-get upgrade -y \
    && apt-get install -y software-properties-common \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php8.2 php8.2-curl php8.2-mbstring php8.2-xml
