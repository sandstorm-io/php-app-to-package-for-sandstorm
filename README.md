This repository contains a sample PHP app demonstrating some of the
Sandstorm platform features.  It was built as a testcase for
[vagrant-spk](https://github.com/sandstorm-io/vagrant-spk)'s support for a PHP stack.

To build this Sandstorm package:

    git clone git://github.com/sandstorm-io/vagrant-spk
    git clone git://github.com/sandstorm-io/php-app-to-package-for-sandstorm
    export PATH=$(pwd)/vagrant-spk:$PATH
    cd php-app-to-package-for-sandstorm
    vagrant-spk setupvm lemp
    vagrant-spk vm up
    vagrant-spk init
    # edit .sandstorm/sandstorm-pkgdef.capnp in your editor of choice
    vagrant-spk dev
    # visit http://local.sandstorm.io:6090 in a web browser
    # log in as Alice, the admin account
    # launch an instance of the example app, play around with it
    # then, press Ctrl-C to stop the tracing vagrant-spk dev
    vagrant-spk pack example.spk
    # You now have an .spk file.  Yay!
