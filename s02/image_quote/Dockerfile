FROM centos:centos7

RUN yum -y install httpd php && \
    yum -y install php-mysql && \
    yum clean all && rm -rf /var/cache/yum

RUN rm -fr /etc/httpd/conf.d
COPY etc etc

COPY www /var/www/html

ENV GRANTED_FILES /etc/httpd /var/www/html /usr/lib64/httpd/modules /run/httpd
RUN chgrp -R 0 $GRANTED_FILES && chmod -R g+rwX $GRANTED_FILES

EXPOSE 8080

ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
