FROM centos:centos7
MAINTAINER "Michele Bariani" <michele.bariani@docomodigital.com>

RUN yum -y install httpd php && \
    yum -y install php-mysql && \
    yum clean all

RUN rm -fr /etc/httpd/conf.d
ADD httpd /etc/httpd

ADD www /var/www/html

ENV GRANTED_FILES /etc/httpd /var/www/html /usr/lib64/httpd/modules /run/httpd
RUN chgrp -R 0 $GRANTED_FILES && chmod -R g+rwX $GRANTED_FILES

EXPOSE 8080

ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
