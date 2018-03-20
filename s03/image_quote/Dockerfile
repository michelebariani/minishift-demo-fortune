FROM centos:centos7

RUN yum -y install httpd php && \
    yum -y install php-mysql && \
    yum clean all

RUN rm -fr /etc/httpd/conf.d
ADD etc/httpd /etc/httpd
ADD etc/php.ini /etc/php.ini

ADD www /var/www/html

ENV GRANTED_FILES /etc/httpd /var/www/html /usr/lib64/httpd/modules /run/httpd
RUN chgrp -R 0 $GRANTED_FILES && chmod -R g+rwX $GRANTED_FILES

EXPOSE 8080

ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
