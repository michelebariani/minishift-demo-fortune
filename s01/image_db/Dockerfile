FROM mysql:5.6

# Not production stuff, obviously :-)
ENV MYSQL_ROOT_PASSWORD foobar

RUN mkdir /var/lib/mysql_novolume ; \
    rm -fr /etc/mysql
COPY etc etc

COPY fortune.sql /docker-entrypoint-initdb.d/fortune.sql
RUN docker-entrypoint.sh mysqld & sleep 30 &&\
    killall mysqld &&\
    rm /docker-entrypoint-initdb.d/fortune.sql

EXPOSE 3306
