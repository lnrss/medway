# medway
World Skill Bordeaux

| Diagramme MCD |
| patient(idPatient INT, firstName VARCHAR(255), lastName VARCHAR(255), login VARCHAR(255), password VARCHAR(255), birthday DATETIME, size INT, weight INT, gender VARCHAR(50)) |
| doctor(idDoctor INT, firstName VARCHAR(255), lastName VARCHAR(255), login VARCHAR(255), password VARCHAR(255)) |
| diagnotic(idDiagnostic INT, idPatient INT, idDoctor INT, description VARCHAR(255), prescription VARCHAR(255)) |
| meet(idMeet INT, date DATETIME, hour DATETIME, idPatient INT, idDoctor INT, reason VARCHAR(255)) |
