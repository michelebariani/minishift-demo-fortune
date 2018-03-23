FROM mysql:5.6

# Not production stuff, obviously :-)
ENV MYSQL_ROOT_PASSWORD foobar

RUN rm -fr /etc/mysql
COPY etc etc
COPY fortune.sql /docker-entrypoint-initdb.d/fortune.sql

EXPOSE 3306
