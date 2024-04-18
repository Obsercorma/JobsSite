-- Script for web app

GRANT USAGE ON *.* TO `bddjobs_user`@`%` IDENTIFIED BY PASSWORD '*C044B4B642347605ECDEC97013EAB82D61A2B2C3';

GRANT SELECT, INSERT, UPDATE, DELETE ON `bddjobs`.* TO `bddjobs_user`@`%`;

GRANT SELECT ON `bddjobs`.`activite` TO `bddjobs_user`@`%`;

GRANT SELECT, INSERT, UPDATE, DELETE ON `bddjobs`.`offre` TO `bddjobs_user`@`%`;

GRANT SELECT ON `bddjobs`.`typecontrat` TO `bddjobs_user`@`%`;

GRANT SELECT ON `bddjobs`.`statut` TO `bddjobs_user`@`%`;

GRANT SELECT, INSERT ON `bddjobs`.`candidature` TO `bddjobs_user`@`%`;

GRANT SELECT, UPDATE ON `bddjobs`.`utilisateur` TO `bddjobs_user`@`%`;

-- Script for admin WPF App

GRANT USAGE ON *.* TO `admin_jobs`@`%` IDENTIFIED BY PASSWORD '*CBFE965376DE6E434F75F3E21151F14CF04CA2C4';

GRANT SELECT, INSERT, UPDATE, DELETE ON `bddjobs`.`activite` TO `admin_jobs`@`%`;

GRANT SELECT, INSERT, UPDATE ON `bddjobs`.`offre` TO `admin_jobs`@`%`;

GRANT SELECT, UPDATE ON `bddjobs`.`utilisateur` TO `admin_jobs`@`%`;

GRANT SELECT ON `bddjobs`.`statutcandid` TO `admin_jobs`@`%`;