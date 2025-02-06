INSERT INTO bus_line (id, name, description) VALUES
(1, 'Linia 10', 'Linia obsługująca centrum miasta.'),
(2, 'Linia 15', 'Linia łącząca centrum z dworcem kolejowym.');
INSERT INTO bus_stop (id, name, location) VALUES
(1, 'Centrum', '52.2297,21.0122'),
(2, 'Dworzec', '52.2200,21.0100'),
(3, 'Osiedle', '52.2400,21.0200');
INSERT INTO route (id, line_id, stops) VALUES
(1, 1, '[{"stop_id": 1, "order": 1}, {"stop_id": 3, "order": 2}]'),
(2, 2, '[{"stop_id": 2, "order": 1}, {"stop_id": 1, "order": 2}]');
INSERT INTO schedule (id, route_id, stop_id, departure_time) VALUES
(1, 1, 1, '08:00'),
(2, 1, 3, '08:15'),
(3, 2, 2, '09:00'),
(4, 2, 1, '09:20');
