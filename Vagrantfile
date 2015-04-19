# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.network :private_network, ip: "192.168.99.99"
  config.vm.provision "shell", path: "install.sh"
  config.vm.synced_folder "./wp", "/var/www"
  config.vm.synced_folder "./conf", "/conf"
  config.vm.synced_folder "~/Dropbox/LondonStudent/site/", "/db"
end
