# openshift-demo-fortune

A simple and silly application to be used in an Openshift/Minishift demo, in progressive stages:

* Stage 1  : The native Docker way

* Stage 2  : Build Docker images that can run in Openshift (uid constraints)

* Stage 3  : Add YAML Manifest files, and use them

* Stage 4  : Add a second (consumer) application, and exploit a base image

* Stage 5  : Add some health check on containers

* Stage 6  : POC of manifest templating against different profiles (e.g. local vs live) exploiting [jinja2-cli][1]

* Stage 7  : POC of autoscaling features (requires [metrics to be enabled][2])

* Stage 7a : A bit overcomplicated POC of autoscaling features (keeps current number of running replicas)

* Stage 8  : Introduce ConfigMap/Secret usage (although just updating them does NOT trigger a rolling update)

[1]: https://github.com/mattrobenolt/jinja2-cli
[2]: https://docs.openshift.org/latest/install_config/cluster_metrics.html

