<?php return unserialize('a:4:{i:0;O:30:"Doctrine\\ORM\\Mapping\\ManyToOne":4:{s:12:"targetEntity";s:45:"Core\\TroubleTicketBundle\\Entity\\TroubleTicket";s:7:"cascade";a:1:{i:0;s:7:"persist";}s:5:"fetch";s:4:"LAZY";s:10:"inversedBy";s:4:"logs";}i:1;O:31:"Doctrine\\ORM\\Mapping\\JoinColumn":7:{s:4:"name";s:17:"trouble_ticket_id";s:20:"referencedColumnName";s:2:"id";s:6:"unique";b:0;s:8:"nullable";b:0;s:8:"onDelete";s:7:"CASCADE";s:16:"columnDefinition";N;s:9:"fieldName";N;}i:2;O:47:"Symfony\\Component\\Validator\\Constraints\\NotNull":2:{s:7:"message";s:30:"This value should not be null.";s:6:"groups";a:1:{i:0;s:7:"Default";}}i:3;O:48:"Symfony\\Component\\Validator\\Constraints\\NotBlank":2:{s:7:"message";s:31:"This value should not be blank.";s:6:"groups";a:1:{i:0;s:7:"Default";}}}');