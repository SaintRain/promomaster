<?php return unserialize('a:2:{i:0;O:31:"Doctrine\\ORM\\Mapping\\ManyToMany":7:{s:12:"targetEntity";s:49:"Core\\CategoryBundle\\Entity\\ProductVirtualCategory";s:8:"mappedBy";N;s:10:"inversedBy";s:8:"products";s:7:"cascade";a:1:{i:0;s:7:"persist";}s:5:"fetch";s:4:"LAZY";s:13:"orphanRemoval";b:0;s:7:"indexBy";N;}i:1;O:30:"Doctrine\\ORM\\Mapping\\JoinTable":4:{s:4:"name";s:35:"core_product_match_category_virtual";s:6:"schema";N;s:11:"joinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:10:"product_id";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:16:"columnDefinition";N;s:9:"fieldName";N;}}s:18:"inverseJoinColumns";a:1:{i:0;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:27:"product_category_virtual_id";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:16:"columnDefinition";N;s:9:"fieldName";N;}}}}');