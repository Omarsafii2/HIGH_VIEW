-- INSERT INTO product (name, price, description, category_id) VALUES
-- -- Gear Products
-- ('Hiking Backpack', 49.99, 'Durable and water-resistant backpack for all terrains', 4),
-- ('Camping Tent', 99.99, 'Four-person tent, easy setup with waterproof material', 5),
-- ('Sleeping Bag', 59.99, 'Compact and lightweight sleeping bag for cold weather', 6),
-- ('Trekking Poles', 29.99, 'Adjustable poles with shock absorption', 7),
-- ('Camping Stove', 39.99, 'Portable stove with easy ignition', 8),
-- ('Multi-Tool', 19.99, '15-in-1 tool, ideal for camping and emergencies', 9),
-- ('Outdoor Hammock', 24.99, 'Lightweight and strong hammock for outdoor relaxation', 10),
-- ('Water Bottle', 14.99, 'Insulated bottle keeps drinks cold for 24 hours', 11),
-- ('Compass', 12.99, 'Precision compass with high durability', 12),
-- ('First Aid Kit', 22.99, 'Comprehensive first aid kit for outdoor adventures', 13),

-- -- Tool Products
-- ('Hammer', 12.99, 'Heavy-duty hammer for construction and DIY projects', 14),
-- ('Screwdriver Set', 18.99, '10-piece screwdriver set for versatile use', 15),
-- ('Electric Drill', 59.99, 'Cordless drill with variable speed control', 16),
-- ('Toolbox', 29.99, 'Organized toolbox with multiple compartments', 17),
-- ('Wrench Set', 24.99, 'Adjustable wrench set for various tasks', 18),
-- ('Measuring Tape', 8.99, 'Retractable tape for accurate measurements', 4),
-- ('Saw', 25.99, 'Durable hand saw for wood cutting', 5),
-- ('Pliers', 11.99, 'Multi-functional pliers for gripping and cutting', 6),
-- ('Sanding Block', 5.99, 'Ergonomic block for smooth sanding', 7),
-- ('Chisel Set', 14.99, '3-piece chisel set for woodworking', 8),

-- -- Sport Equipment Products
-- ('Yoga Mat', 19.99, 'Non-slip mat with cushioning for yoga and workouts', 9),
-- ('Dumbbell Set', 49.99, 'Adjustable weights for strength training', 10),
-- ('Basketball', 29.99, 'Official size basketball with high grip', 11),
-- ('Soccer Ball', 24.99, 'Durable soccer ball for outdoor play', 12),
-- ('Tennis Racket', 39.99, 'Lightweight and balanced for improved control', 13),
-- ('Football', 27.99, 'Professional-grade football with durable construction', 14),
-- ('Jump Rope', 9.99, 'Speed rope for cardio workouts', 15),
-- ('Baseball Glove', 34.99, 'Leather glove for improved catching comfort', 16),
-- ('Resistance Bands', 14.99, 'Set of five resistance bands for strength training', 17),
-- ('Boxing Gloves', 29.99, 'Protective gloves for boxing and training', 18),

-- -- Additional Products (repeating structure for variety)
-- ('Climbing Helmet', 44.99, 'Safety helmet for climbing and mountain sports', 4),
-- ('Headlamp', 15.99, 'LED headlamp with multiple brightness settings', 5),
-- ('Camping Chair', 24.99, 'Folding chair with cup holder', 6),
-- ('Sleeping Pad', 29.99, 'Lightweight pad for added comfort in tents', 7),
-- ('Portable Grill', 49.99, 'Compact grill for outdoor cooking', 8),
-- ('Binoculars', 32.99, 'High-magnification binoculars for clear viewing', 9),
-- ('Fishing Rod', 39.99, 'Flexible and lightweight fishing rod', 10),
-- ('Kayak Paddle', 49.99, 'Adjustable paddle for kayaking adventures', 11),
-- ('Golf Clubs', 199.99, 'Complete golf club set with bag', 12),
-- ('Helmet', 19.99, 'Protective helmet for biking and skating', 13),

-- -- More Tool Products
-- ('Ratchet Set', 26.99, 'Set of ratchets for mechanical tasks', 14),
-- ('Socket Wrench', 15.99, 'Precision socket wrench with multiple heads', 15),
-- ('Allen Key Set', 7.99, 'Hex key set for various adjustments', 16),
-- ('Wire Cutter', 12.99, 'Sharp cutter for electrical work', 17),
-- ('Flashlight', 13.99, 'High-lumen flashlight for visibility', 18),
-- ('Hand Saw', 14.99, 'Hand saw for fine cutting', 4),
-- ('Level Tool', 9.99, 'Tool for ensuring balance', 5),
-- ('Paint Brush Set', 10.99, 'High-quality brushes for painting projects', 6),
-- ('Utility Knife', 8.99, 'Razor-sharp utility knife for cutting', 7),
-- ('Power Drill', 59.99, 'Corded power drill with high torque', 8);

-- -- Continue adding items in this pattern until 100 rows are reached
-- INSERT INTO category (name,img)
-- VALUES
-- ('Camping','../views/public/images/category_img/Camping.png'),
-- ('4x4 Off-Roading','../views/public/images/category_img/4x4 Off-Roading.png'),
-- ('Bird Hunting','../views/public/images/category_img/Bird hunting.png'),
-- ('Spelunking','../views/public/images/category_img/Spelunking.png'),
-- ('Cycling','../views/public/images/category_img/Cycling.png'),
-- ('Endurance Sports','../views/public/images/category_img/Endurance Sports.png'),
-- ('Fishing','../views/public/images/category_img/Fishing.png'),
-- ('Horseback Riding','../views/public/images/category_img/Horseback Riding.png'),
-- ('Kitesurfing','../views/public/images/category_img/Kitesurfing.png'),
-- ('	
-- Kayaking and Canoeing','../views/public/images/category_img/	
-- Kayaking and Canoeing.png'),
-- ('Rock Climbing','../views/public/images/category_img/Rock Climbing.png'),
-- ('Sandboarding
-- ','../views/public/images/category_img/Sandboarding
-- .png'),
-- ('Scuba Diving Wrecks','../views/public/images/category_img/Scuba Diving Wrecks.png'),
-- ('Water Sport','../views/public/images/category_img/Water Sport.png');


CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);