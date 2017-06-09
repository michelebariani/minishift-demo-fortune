
FROM centos:centos7
MAINTAINER "Michele Bariani" <michele.bariani@docomodigital.com>

RUN yum -y install httpd php && \
    yum -y install php-mysql && \
    yum clean all

RUN rm -fr /etc/httpd/conf.d
ADD httpd /etc/httpd

ADD www /var/www/html

EXPOSE 8080

ENTRYPOINT ["/usr/sbin/httpd", "-f", "/etc/httpd/conf/httpd.conf", "-DFOREGROUND"]
