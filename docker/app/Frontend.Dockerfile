FROM alpine:latest

RUN apk add --update --no-cache \
    nodejs npm

WORKDIR /app

COPY . /app

RUN npm install

CMD ["/bin/sh", "-c", "npm run watch-poll"]
