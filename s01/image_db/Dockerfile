FROM mysql:5.6

# Not production stuff, obviously :-)
ENV MYSQL_ROOT_PASSWORD foobar

RUN rm -fr /etc/mysql
ADD etc etc

COPY fortune.sql /docker-entrypoint-initdb.d/fortune.sql

RUN /entrypoint.sh mysqld & sleep 30 &&\
    killall mysqld &&\
    rm /docker-entrypoint-initdb.d/fortune.sql

EXPOSE 3306
