FROM ubuntu:24.04

RUN \
    # deb http://archive.ubuntu.com/ubuntu vivid main restricted universe && \
    apt-get update && apt-get install --no-install-recommends -y \
    ca-certificates \
    locales \
    curl \
    zip \ 
    unzip \
    vim-tiny \
    && apt-get clean && rm -rf /var/lib/apt/lists/* 

# gnu linux images for aarch64 (mac dev) und x86_64 (prod)
RUN ARCH=$(uname -m) \
    && curl -L --progress-bar "https://github.com/php/frankenphp/releases/download/v1.12.2/frankenphp-linux-$ARCH-gnu" -o "/frankenphp" \
    && chmod +x "/frankenphp" \
    && mv /frankenphp /usr/bin/ 
# && setcap 'cap_net_bind_service=+ep' "/usr/bin/frankenphp" 

WORKDIR /app

