FROM mysql:5.6
MAINTAINER "Michele Bariani" <michele.bariani@docomodigital.com>

# Not production stuff, obviously :-)
ENV MYSQL_ROOT_PASSWORD foobar

RUN rm -fr /etc/mysql
ADD etc etc

COPY fortune.sql /docker-entrypoint-initdb.d/fortune.sql

RUN /entrypoint.sh mysqld & sleep 30 &&\
    killall mysqld &&\
    rm /docker-entrypoint-initdb.d/fortune.sql

RUN chgrp -R 0 /var/lib/mysql* /var/run/mysqld /etc/mysql && \
    chmod -R g+rwX /var/lib/mysql* /var/run/mysqld /etc/mysql
