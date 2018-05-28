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

ENV GRANTED_FILES /var/lib/mysql* /var/run/mysqld /etc/mysql
RUN chgrp -R 0 $GRANTED_FILES && chmod -R g+rwX $GRANTED_FILES
