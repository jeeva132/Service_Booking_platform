// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['specialization'])) {
//     $specialization = $_POST['specialization'];
//     $photoLink = ""; // Initialize the photo link variable

//     // Determine the photo link based on the worker's specialization
//     switch ($specialization) {
//         case "Electrician":
//             $photoLink = "https://media.istockphoto.com/id/612248188/photo/electrical-tools-and-cables-used-in-electrical-installations.jpg?s=612x612&w=0&k=20&c=HZYqsuQOL_ktpejF7-2b4Po43uyuG1VaHJ5eu522R84=";
//             break;
//         case "Plumber":
//             $photoLink = "https://media.istockphoto.com/id/504899590/photo/work-tool-with-plan.jpg?s=1024x1024&w=is&k=20&c=GCtIwTURwLNvIE-Dbtyd0Khc3-aG7jrsIBWfVxSuJoU=";
//             break;
//         case "Gardener":
//             $photoLink = "https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=";
//             break;
//         case "House Cleaner":
//             $photoLink = "https://media.istockphoto.com/id/654153664/photo/cleaning-service-sponges-chemicals-and-mop.jpg?s=612x612&w=0&k=20&c=vHQzKbz7L8oEKEp5oQzfx8rwsOMAV3pHTV_1VPZsREA=";
//             break;
//         case "Handyman":
//             $photoLink = "https://media.istockphoto.com/id/1437985539/photo/man-in-apron-and-gloves-holds-cordless-screwdriver-on-white-background.jpg?s=612x612&w=0&k=20&c=aRQt62kFA5inAg-NwYUj1tPIzDBS0X4bI-hY9r8dyPE=";
//             break;
//         case "HVAC Technician":
//             $photoLink = "https://media.istockphoto.com/id/929901516/photo/tool-for-air-conditioner-maintenance.jpg?s=612x612&w=0&k=20&c=TnYVHSvBYfLYgEee2CO0NAfj8wF2jOQCA_IRHswHrJk=";
//             break;
//         case "Painter":
//             $photoLink = "https://media.istockphoto.com/id/502281464/photo/decorators-work-table-with-tools.jpg?s=612x612&w=0&k=20&c=EbcdISlitVimhLsIsa6Bp_S7yPxUQh3gQxLRDBKLTRQ=";
//             break;
//         case "Roofing Contractor":
//             $photoLink = "https://media.istockphoto.com/id/1175090625/photo/roof-repair-construction-worker-roofer-man-roofing-security-rope.jpg?s=612x612&w=0&k=20&c=SclRJKkVmGqOZR0jSI7C82nco2QFXWxTGNQ-MCRyVmU=";
//             break;
//         case "Pest Control Services":
//             $photoLink = "https://media.istockphoto.com/id/1351445474/photo/worker-spraying-pesticide-onto-green-bush-outdoors-closeup-pest-control.jpg?s=612x612&w=0&k=20&c=Qja4e6kFoxsXqQi4DE-xQKwumVrGMVKds_OuKFu452A=";
//             break;
//         case "Locksmith":
//             $photoLink = "https://media.istockphoto.com/id/1025587638/photo/installation-locked-interior-door-knobs-close-up-woodworker-hands-install-lock.jpg?s=612x612&w=0&k=20&c=M1RGYLhG428zQzlacok7PjhqQDvwBuJ2whfkRtWIG_U=";
//             break;
//         case "Appliance Repair Technician":
//             $photoLink = "https://media.istockphoto.com/id/1025966854/photo/set-of-household-kitchen-technics-on-yellow-background-set-of-appliance-in-the-new.jpg?s=612x612&w=0&k=20&c=blrExWEZ0AtRFbgh4aKiU5PRtk2GodrYQ499wqQfDug=";
//             break;
//         case "Moving Company":
//             $photoLink = "https://media.istockphoto.com/id/1395748211/photo/van-full-of-moving-boxes-and-furniture-near-house.jpg?s=612x612&w=0&k=20&c=pa1S7xB4fw6R5i3wdibeO1DdwfQ5a9gGJLQDTu5I3LM=";
//             break;
//         case "Carpet Cleaner":
//             $photoLink = "https://media.istockphoto.com/id/1277190972/photo/human-cleaning-carpet-in-the-living-room-using-vacuum-cleaner-at-home.jpg?s=612x612&w=0&k=20&c=tDo_ubVBezJ421RglzfMIGzCu38dhyKxuadtgoj5J9k=";
//             break;
//         case "Interior Designer":
//             $photoLink = "https://media.istockphoto.com/id/499719900/photo/home-decoration-and-renovation-concept.jpg?s=612x612&w=0&k=20&c=iyIaKwmjwACN1tK152h6llUzW-59K1uk8O4iIJPZ7VU=";
//             break;
//         case "Home Security System Installation":
//             $photoLink = "https://media.istockphoto.com/id/1023491058/photo/man-install-outdoor-surveillance-ip-camera-for-home-security.jpg?s=612x612&w=0&k=20&c=5YH3yW8p5XNgEXpDbEJAJr0_GeZkLkC5zo1EhyDrMHU=";
//             break;
//         case "Home Theater Installation":
//             $photoLink = "https://media.istockphoto.com/id/183799640/photo/worker-installing-a-residential-wall-speaker.jpg?s=612x612&w=0&k=20&c=U8AV68w0eRBge448rQWpeaONtOpaRaZJCtYm8td-_2s=";
//             break;
//         case "Landscaping Services":
//             $photoLink = "https://media.istockphoto.com/id/475958716/photo/lawn-mower.jpg?s=612x612&w=0&k=20&c=TIGBHDkXS9IJbq84NHtfsFIPp_aqy6APWni2r_oS2NQ=";
//             break;
//         case "Auto Mechanic":
//             $photoLink = "https://media.istockphoto.com/id/1347150429/photo/professional-mechanic-working-on-the-engine-of-the-car-in-the-garage.jpg?s=612x612&w=0&k=20&c=5zlDGgLNNaWsp_jq_L1AsGT85wrzpdl3kVH-75S-zTU=";
//             break;
//         case "Mobile Phone Repair":
//             $photoLink = "https://media.istockphoto.com/id/1183921783/photo/smartphone-repairman-man-securing-a-screw.jpg?s=612x612&w=0&k=20&c=OrW0DPaqQqAbgPdNT6DabmZCt6UtTOqy7V-ERGFBAn8=";
//             break;
//         case "Computer Repair Technician":
//             $photoLink = "https://media.istockphoto.com/id/928791064/photo/technician-repairing-laptop-computer-closeup.jpg?s=612x612&w=0&k=20&c=QF43BNi5BL9wXRYBbUiRrp-oqnQgM1hsN7XhlHsvTSc=";
//             break;
//         case "Pet Grooming":
//             $photoLink = "https://media.istockphoto.com/id/969097426/photo/cavalier-king-charles-spaniel-dog-grooming-session.jpg?s=612x612&w=0&k=20&c=uWJaDFF7hVPrQIQ0L-fpH3nm99ehqiC1JUPkA-cLhfw=";
//             break;
//         case "Personal Trainer":
//             $photoLink = "https://media.istockphoto.com/id/671714484/photo/athletes-set-with-female-clothing-sneakers-and-bottle-of-water-on-gray-background.jpg?s=612x612&w=0&k=20&c=QGRgAmN6Siv3kNlWioQ-l5VuWXUaab45XsgXpifON5U=";
//             break;
//         case "Massage Therapist":
//             $photoLink = "https://media.istockphoto.com/id/1423676895/photo/wood-therapy-instruments-on-massage-table.jpg?s=612x612&w=0&k=20&c=UJheuI_lgC7tA2OFdrDxyA7eeS1-_TBc2jZ9uMUiTpk=";
//             break;
//         case "Catering Services":
//             $photoLink = "https://media.istockphoto.com/id/637765812/photo/cuisine-culinary-buffet-dinner-catering-dining-food-celebration.jpg?s=612x612&w=0&k=20&c=7l_HRkrBJ6ewkfYx1rQtNbDDWcf4V8dyo1GbiHmWGYs=";
//             break;
//         case "Event Planner":
//             $photoLink = "https://media.istockphoto.com/id/1020504438/photo/speech-therapist-teaching-a-language-an-autistic-child-in-an-office.jpg?s=612x612&w=0&k=20&c=73MJ9KglWa-bJ5Wh-g3Wel4T_7cfopDoUFyRHOHpbJU=";
//             break;
//         case "Graphic Designer":
//             $photoLink = "https://media.istockphoto.com/id/1363772590/photo/graphic-designer-at-work.jpg?s=612x612&w=0&k=20&c=iohoaTPfd9MpvwKTjpy7tsA2RSdZEQGvsUOLrn5BsDI=";
//             break;
//         case "Web Developer":
//             $photoLink = "https://media.istockphoto.com/id/1395344871/photo/young-woman-writing-code-on-desktop-computer-in-stylish-loft-apartment-in-the-evening.jpg?s=612x612&w=0&k=20&c=7tiND3HGFEHfKSm6CBoucQPJQKSRy8H9fOvhKoc8cgE=";
//             break;
//         case "Tutoring Services":
//             $photoLink = "https://media.istockphoto.com/id/1220200250/photo/chef-cooking-vegetables-in-pan.jpg?s=612x612&w=0&k=20&c=HoMt5HaMu0P-SiZ8mGglSqln55Aw9gCxSwTDoS8VK5U=";
//             break;
//         case "Personal Chef":
//             $photoLink = "https://media.istockphoto.com/id/1288964234/photo/car-detailing-service-deep-interior-cleaning.jpg?s=612x612&w=0&k=20&c=O1jFEKtCipreEAIOhEkIwYxkq0OBd8rMYe8bOFPngtc=";
//             break;
//         default:
//             // If the specialization doesn't match any case, you can set a default photo link here or leave it empty for NULL.
//             $photoLink = "";
//     }

//     // Update the specialization and photo link in the employees table
//     $stmt = $conn->prepare("UPDATE employees SET specialization = ?, photo = ? WHERE id = ?");
//     $stmt->bind_param("ssi", $specialization, $photoLink, $user_id);
//     $stmt->execute();
    

//     // Redirect to http://localhost/mininew/workerpro.php after updating the specialization
//     header("Location: http://localhost/mininew/workerpro.php");
//     exit();
// }