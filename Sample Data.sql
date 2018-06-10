SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET FOREIGN_KEY_CHECKS = 0;

-- Locations are Kruger National Park, South Africa, Patagonia, Chile, Sichuan, China, and Ohiopyle, PA
INSERT INTO user_wildlife (name, animal_group, keyword_1, keyword_2, keyword_3, description, quantity, date_spotted, zipcode, latitude, longitude) VALUES
('Giraffe', 'Mammal', 'Spotted', 'Long Neck', 'Tall', 'The giraffe (Giraffa) is a genus of African even-toed ungulate mammals, the tallest living terrestrial animals and the largest ruminants. The genus consists of eleven species including Giraffa camelopardalis, the type species. Seven of these species are extinct, prehistoric species known from fossils, while four are still extant. Whereas Giraffa once was thought to contain a single extant species with numerous subspecies, research into the mitochondrial and nuclear DNA of Giraffa has revealed four to six distinct extant species. The four-species taxonomic classification has the genus Giraffa composed of the species Giraffa giraffa (southern giraffe), Giraffa tippelskirchi (Masai giraffe), Giraffa reticulata (reticulated giraffe) and Giraffa camelopardalis (northern giraffe).', 2, '2017-03-06', NULL, -23.9883848, 31.5547402),
('Elephant', 'Mammal', 'Nose', 'Big Ears', 'Tusk', 'Elephants are large mammals of the family Elephantidae and the order Proboscidea. Three species are recognised, the African bush elephant (Loxodonta africana), the African forest elephant (L. cyclotis) the Asian elephant (Elephas maximus). Elephants are scattered throughout sub-Saharan Africa, South Asia, and Southeast Asia. Elephantidae is the only surviving family of the order Proboscidea; other, now extinct, members of the order include deinotheres, gomphotheres, mammoths, and mastodons. Male African elephants are the largest extant terrestrial animals and can reach a height of 4 m (13 ft) and weigh 7,000 kg (15,000 lb). All elephants have several distinctive features, the most notable of which is a long trunk or proboscis, used for many purposes, particularly breathing, lifting water, and grasping objects. Their incisors grow into tusks, which can serve as weapons and as tools for moving objects and digging. Elephants'' large ear flaps help to control their body temperature. Their pillar-like legs can carry their great weight. African elephants have larger ears and concave backs while Asian elephants have smaller ears and convex or level backs.', 1, '2017-03-06', NULL, -23.9883848, 31.5547402),
('Zebra', 'Mammal', 'Stripes', 'Four Legs', 'Black and White', 'Zebras (/?z?br?/ zeb-r? or /?zi?br?/ zee-br?)[1] are several species of African equids (horse family) united by their distinctive black and white striped coats. Their stripes come in different patterns, unique to each individual. They are generally social animals that live in small harems to large herds. Unlike their closest relatives, horses and donkeys, zebras have never been truly domesticated.', 50, '2017-02-23', NULL, -23.9883848, 31.5547402),
('Lion', 'Mammal', 'Mane', 'Roar', 'Teeth', 'The lion (Panthera leo) is one of the big cats in the genus Panthera and a member of the family Felidae. The commonly used term African lion collectively denotes the several subspecies in Africa. With some males exceeding 250 kg (550 lb) in weight,[4] it is the second-largest living cat after the tiger. Wild lions currently exist in sub-Saharan Africa and in India (where an endangered remnant population resides in Gir Forest National Park). In ancient historic times, their range was in most of Africa, including North Africa, and across Eurasia from Greece and southeastern Europe to India. In the late Pleistocene, about 10,000 years ago, the lion was the most widespread large land mammal after humans: Panthera leo spelaea lived in northern and western Europe and Panthera leo atrox lived in the Americas from the Yukon to Peru.[5] The lion is classified as a vulnerable species by the International Union for Conservation of Nature (IUCN), having seen a major population decline in its African range of 30–50% over two decades during the second half of the twentieth century.[2] Lion populations are untenable outside designated reserves and national parks. Although the cause of the decline is not fully understood, habitat loss and conflicts with humans are the greatest causes of concern. Within Africa, the West African lion population is particularly endangered.\r\n\r\nIn the wild, males seldom live longer than 10 to 14 years, as injuries sustained from continual fighting with rival males greatly reduce their longevity.[6] In captivity they can live more than 20 years. They typically inhabit savanna and grassland, although they may take to bush and forest. Lions are unusually social compared to other cats. A pride of lions consists of related females and offspring and a small number of adult males. Groups of female lions typically hunt together, preying mostly on large ungulates. Lions are apex and keystone predators, although they are also expert scavengers obtaining over 50 percent of their food by scavenging as opportunity allows. While lions do not typically hunt humans, some have. Sleeping mainly during the day, lions are active primarily at night (nocturnal), although sometimes at twilight (crepuscular).[7][8]', 800, '2017-03-01', NULL, -23.9883848, 31.5547402),
('Penguin', 'Bird', 'Can''t fly', 'Black and white', 'Beak', 'Penguins (order Sphenisciformes, family Spheniscidae) are a group of aquatic, flightless birds. They live almost exclusively in the Southern Hemisphere, with only one species, the Galapagos penguin, found north of the equator. Highly adapted for life in the water, penguins have countershaded dark and white plumage, and their wings have evolved into flippers. Most penguins feed on krill, fish, squid and other forms of sealife caught while swimming underwater. They spend about half of their lives on land and half in the oceans.\r\n\r\nAlthough almost all penguin species are native to the Southern Hemisphere, they are not found only in cold climates, such as Antarctica. In fact, only a few species of penguin live so far south. Several species are found in the temperate zone, and one species, the Galápagos penguin, lives near the equator.', 3, '2017-01-11', NULL, -41.8101472,-68.9062689),
('Albatross', 'Bird', 'Seabird', 'beak', 'Fly', 'Albatrosses, of the biological family Diomedeidae, are large seabirds allied to the procellariids, storm petrels and diving petrels in the order Procellariiformes (the tubenoses). They range widely in the Southern Ocean and the North Pacific. They are absent from the North Atlantic, although fossil remains show they once occurred there and occasional vagrants are found. Albatrosses are among the largest of flying birds, and the great albatrosses (genus Diomedea) have the largest wingspans of any extant birds, reaching up to 3.7 metres (12 feet). The albatrosses are usually regarded as falling into four genera, but there is disagreement over the number of species.', 26, '2017-02-22', NULL, -41.8101472,-68.9062689),
('Panda', 'Mammal', 'black and white', 'cuddly', 'bamboo', 'The giant panda (Ailuropoda melanoleuca, literally "black and white cat-foot"; Chinese: ???; pinyin: dà xióng m?o, literally "big bear cat"),[3] also known as panda bear or simply panda, is a bear[4] native to south central China.[1] It is easily recognized by the large, distinctive black patches around its eyes, over the ears, and across its round body. The name "giant panda" is sometimes used to distinguish it from the unrelated red panda. Though it belongs to the order Carnivora, the giant panda''s diet is over 99% bamboo.[5] Giant pandas in the wild will occasionally eat other grasses, wild tubers, or even meat in the form of birds, rodents or carrion. In captivity, they may receive honey, eggs, fish, yams, shrub leaves, oranges, or bananas along with specially prepared food.[6][7]\r\n\r\nThe giant panda lives in a few mountain ranges in central China, mainly in Sichuan province, but also in neighbouring Shaanxi and Gansu.[8] As a result of farming, deforestation, and other development, the giant panda has been driven out of the lowland areas where it once lived.', 654, '2017-03-20', NULL, 30.651226, 104.075881),
('Giraffe', 'Mammal', 'Spotted', 'Long Neck', 'Tall', 'The giraffe (Giraffa) is a genus of African even-toed ungulate mammals, the tallest living terrestrial animals and the largest ruminants. The genus consists of eleven species including Giraffa camelopardalis, the type species. Seven of these species are extinct, prehistoric species known from fossils, while four are still extant. Whereas Giraffa once was thought to contain a single extant species with numerous subspecies, research into the mitochondrial and nuclear DNA of Giraffa has revealed four to six distinct extant species. The four-species taxonomic classification has the genus Giraffa composed of the species Giraffa giraffa (southern giraffe), Giraffa tippelskirchi (Masai giraffe), Giraffa reticulata (reticulated giraffe) and Giraffa camelopardalis (northern giraffe).', 2, '2017-03-06', NULL, 39.871742, -79.49226059999999),
('Elephant', 'Mammal', 'Nose', 'Big Ears', 'Tusk', 'Elephants are large mammals of the family Elephantidae and the order Proboscidea. Three species are recognised, the African bush elephant (Loxodonta africana), the African forest elephant (L. cyclotis) the Asian elephant (Elephas maximus). Elephants are scattered throughout sub-Saharan Africa, South Asia, and Southeast Asia. Elephantidae is the only surviving family of the order Proboscidea; other, now extinct, members of the order include deinotheres, gomphotheres, mammoths, and mastodons. Male African elephants are the largest extant terrestrial animals and can reach a height of 4 m (13 ft) and weigh 7,000 kg (15,000 lb). All elephants have several distinctive features, the most notable of which is a long trunk or proboscis, used for many purposes, particularly breathing, lifting water, and grasping objects. Their incisors grow into tusks, which can serve as weapons and as tools for moving objects and digging. Elephants'' large ear flaps help to control their body temperature. Their pillar-like legs can carry their great weight. African elephants have larger ears and concave backs while Asian elephants have smaller ears and convex or level backs.', 1, '2017-02-06', NULL, 39.871742, -79.49226059999999),
('Zebra', 'Mammal', 'Stripes', 'Four Legs', 'Black and White', 'Zebras (/?z?br?/ zeb-r? or /?zi?br?/ zee-br?)[1] are several species of African equids (horse family) united by their distinctive black and white striped coats. Their stripes come in different patterns, unique to each individual. They are generally social animals that live in small harems to large herds. Unlike their closest relatives, horses and donkeys, zebras have never been truly domesticated.', 50, '2017-01-23', NULL, 39.871742, -79.49226059999999),
('Lion', 'Mammal', 'Mane', 'Roar', 'Teeth', 'The lion (Panthera leo) is one of the big cats in the genus Panthera and a member of the family Felidae. The commonly used term African lion collectively denotes the several subspecies in Africa. With some males exceeding 250 kg (550 lb) in weight,[4] it is the second-largest living cat after the tiger. Wild lions currently exist in sub-Saharan Africa and in India (where an endangered remnant population resides in Gir Forest National Park). In ancient historic times, their range was in most of Africa, including North Africa, and across Eurasia from Greece and southeastern Europe to India. In the late Pleistocene, about 10,000 years ago, the lion was the most widespread large land mammal after humans: Panthera leo spelaea lived in northern and western Europe and Panthera leo atrox lived in the Americas from the Yukon to Peru.[5] The lion is classified as a vulnerable species by the International Union for Conservation of Nature (IUCN), having seen a major population decline in its African range of 30–50% over two decades during the second half of the twentieth century.[2] Lion populations are untenable outside designated reserves and national parks. Although the cause of the decline is not fully understood, habitat loss and conflicts with humans are the greatest causes of concern. Within Africa, the West African lion population is particularly endangered.\r\n\r\nIn the wild, males seldom live longer than 10 to 14 years, as injuries sustained from continual fighting with rival males greatly reduce their longevity.[6] In captivity they can live more than 20 years. They typically inhabit savanna and grassland, although they may take to bush and forest. Lions are unusually social compared to other cats. A pride of lions consists of related females and offspring and a small number of adult males. Groups of female lions typically hunt together, preying mostly on large ungulates. Lions are apex and keystone predators, although they are also expert scavengers obtaining over 50 percent of their food by scavenging as opportunity allows. While lions do not typically hunt humans, some have. Sleeping mainly during the day, lions are active primarily at night (nocturnal), although sometimes at twilight (crepuscular).[7][8]', 800, '2017-03-01', NULL, 39.871742, -79.49226059999999),
('Penguin', 'Bird', 'Can''t fly', 'Black and white', 'Beak', 'Penguins (order Sphenisciformes, family Spheniscidae) are a group of aquatic, flightless birds. They live almost exclusively in the Southern Hemisphere, with only one species, the Galapagos penguin, found north of the equator. Highly adapted for life in the water, penguins have countershaded dark and white plumage, and their wings have evolved into flippers. Most penguins feed on krill, fish, squid and other forms of sealife caught while swimming underwater. They spend about half of their lives on land and half in the oceans.\r\n\r\nAlthough almost all penguin species are native to the Southern Hemisphere, they are not found only in cold climates, such as Antarctica. In fact, only a few species of penguin live so far south. Several species are found in the temperate zone, and one species, the Galápagos penguin, lives near the equator.', 3, '2016-12-11', NULL, 39.871742, -79.49226059999999),
('Albatross', 'Bird', 'Seabird', 'beak', 'Fly', 'Albatrosses, of the biological family Diomedeidae, are large seabirds allied to the procellariids, storm petrels and diving petrels in the order Procellariiformes (the tubenoses). They range widely in the Southern Ocean and the North Pacific. They are absent from the North Atlantic, although fossil remains show they once occurred there and occasional vagrants are found. Albatrosses are among the largest of flying birds, and the great albatrosses (genus Diomedea) have the largest wingspans of any extant birds, reaching up to 3.7 metres (12 feet). The albatrosses are usually regarded as falling into four genera, but there is disagreement over the number of species.', 26, '2013-11-22', NULL, 39.871742, -79.49226059999999),
('Panda', 'Mammal', 'black and white', 'cuddly', 'bamboo', 'The giant panda (Ailuropoda melanoleuca, literally "black and white cat-foot"; Chinese: ???; pinyin: dà xióng m?o, literally "big bear cat"),[3] also known as panda bear or simply panda, is a bear[4] native to south central China.[1] It is easily recognized by the large, distinctive black patches around its eyes, over the ears, and across its round body. The name "giant panda" is sometimes used to distinguish it from the unrelated red panda. Though it belongs to the order Carnivora, the giant panda''s diet is over 99% bamboo.[5] Giant pandas in the wild will occasionally eat other grasses, wild tubers, or even meat in the form of birds, rodents or carrion. In captivity, they may receive honey, eggs, fish, yams, shrub leaves, oranges, or bananas along with specially prepared food.[6][7]\r\n\r\nThe giant panda lives in a few mountain ranges in central China, mainly in Sichuan province, but also in neighbouring Shaanxi and Gansu.[8] As a result of farming, deforestation, and other development, the giant panda has been driven out of the lowland areas where it once lived.', 654, '2016-10-20', NULL, 39.871742, -79.49226059999999);

INSERT INTO expert_wildlife (scientific_name, common_name, appearance, animal_range, habits, diet, migration_routes, mating_season, population, endangered_status, preservation_efforts, articles) VALUES ("Cebinae", "Capuchin Monkey", "Capuchins are black, brown, buff or whitish, but their exact color and pattern depends on the species involved. They reach a length of 30 to 56 cm (12 to 22 in), with tails that are just as long as the body.", "Capuchin monkeys inhabit a large range of Brazil and other parts of Latin and Central America. Capuchin monkeys often live in large groups of 10 to 35 individuals within the forest, although they can easily adapt to places colonized by humans. Usually, a single male will dominate the group, and they have primary rights to mate with the females of their group. However, the white-headed capuchin groups are led by both an alpha male and an alpha female. Each group will cover a large territory, since members must search for the best areas to feed.", "These primates are territorial animals, distinctly marking a central area of their territory with urine and defending it against intruders, though outer areas may overlap. The stabilization of group dynamics is served through mutual grooming, and communication occurs between the monkeys through various calls.Capuchins can jump up to nine feet (three meters), and they use this mode of transport to get from one tree to another. They remain hidden among forest vegetation for most of the day, sleeping on tree branches and descending to the ground to find drinking water.", "The capuchin monkey feeds on a vast range of food types, and is more varied than other monkeys in the family Cebidae. They are omnivores, and consume a variety of plant parts such as leaves, flower and fruit, seeds, pith, woody tissue, sugarcane, bulb, and exudates, as well as arthropods, molluscs, a variety of vertebrates, and even primates. Capuchins have been observed to also be particularly good at catching frogs. They are characterized as innovative and extreme foragers because of their ability to acquire sustenance from a wide collection of unlikely food, which may assure them survival in habitats with extreme food limitation. Capuchins living near water will also eat crabs and shellfish by cracking their shells with stones.", "None", "There is no set mating season for the Capuchin Monkey. As long as there is enough food they will take part in such activities. The dominant male of the group is the only one that will be able to mate with the mature females. There is usually only one young born at a time.", 30000, "Not endangered", "Destruction of the natural habitat is a problem for the Capuchin Monkey. However, it is believed that they aren’t in critical danger at this point in time. They are more isolated than other Monkeys so they seem to be doing well in that location. There isn’t information on the exact number of them that are in the wild today. The fact that they are versatile though and so intelligent means that they have ways to be able find new ways of thriving in a habitat that may be changing. However, many experts feel that we do need to work on protecting their environment. That will prevent their numbers to ever getting as low as those of many other Monkey species.", "Fragaszy, Dorothy M.; the Genus Cebus. Cambridge University Press. p. 5. ISBN 978-0-521-66768-5
Saint-Hilaire, E. G.; Cuvier, F. G. (1924). Histoire Naturelle des Mammifères. Paris, impr. de C. de Visalberghi, Elisabetta; Fedigan, Linda M. (21 June 2004). The Complete Capuchin: The Biology of Lasteyrie. OCLC 166026273.
Rossiter, William (1879). An illustrated dictionary of scientific terms. London & Glasgow: William Collins, Sons, and Company. ISBN 0-548-93307-3.
Amaral, P. J. S; Finotelo, L. F. M.; De Oliveira, E. H. C; Pissinatti, A.; Nagamachi, C. Y.; Pieczarka, J. C. (2008). Phylogenetic studies of the genus Cebus (Cebidae-Primates) using chromosome painting and G-banding. BMC Evol Biol. 8: 169. doi:10.1186/1471-2148-8-169. PMC 2435554 Freely accessible. PMID 18534011.
Rylands, A. B.; Kierulff, M. C. M.; Mittermeier, R. A. (2005). Notes on the taxonomy and distributions of the tufted capuchin monkeys (Cebus, Cebidae) of South America. Lundiana. 6 (supp.): 97–110.
Silva Jr., J. de S. (2001). Especiação nos macacos-prego e caiararas, gênero Cebus Erxleben, 1777 (Primates, Cebidae). PhD thesis, Rio de Janeiro, Universidade Federal do Rio de Janeiro.
IUCN (2008). 2008 IUCN Red List of Threatened Species. Accessed 23 November 2008
Lynch Alfaro, J.W.; et al. (2011). Explosive Pleistocene range expansion leads to widespread Amazonian sympatry between robust and gracile capuchin monkeys. Journal of Biogeography. 39 (2): 272–288. doi:10.1111/j.1365-2699.2011.02609.x.
Lynch Alfaro, J.W.; Silva, j.; Rylands, A.B. (2012). How Different Are Robust and Gracile Capuchin Monkeys? An Argument for the Use of Sapajus and Cebus. American Journal of Primatology: 1–14. doi:10.1002/ajp.22007. PMID 22328205.
Garber, P.A., Gomes, D.F. & Bicca-Marquez, J.C. (2011). Experimental Field Study of Problem-Solving Using Tools in Free-Ranging Capuchins (Sapajus nigritus, formerly Cebus nigritus). American Journal of Primatology. 74 (4): 344–58. doi:10.1002/ajp.20957. PMID 21538454. Archived from the original (PDF) on 2012-12-18."), 
("Lemuroidea", "Lemur", "Lemur species range in size from the tiny pygmy mouse lemur, weighing in at about an ounce, to the 15-pound indri lemur and the sifaka, which are both about the size of a standard house cat.", "Madagascar", "Most lemurs are arboreal, living in trees. They spend most of their time at the top of the rainforest canopy or in the forest midlevel. An exception is the ring-tailed lemur, which spends most of its time on the ground. The majority of lemurs are also diurnal, awake during the day and asleep at night — especially those that live in groups, including the ring-tailed lemurs, brown lemurs, and sifakas. The smaller mouse lemurs and dwarf lemurs are nocturnal, preferring to be active in the relative safety of nighttime darkness. The aye-aye, a fascinating lemur with an elongated, claw-like middle finger which it uses to dig insects out of tree bark, is also nocturnal, and is often feared by the Malagasy people of its native Madagascar because of its unusual appearance. Lemur females are dominant. A group of lemurs usually has one dominant female who leads the group, controls their movement, and has first choice of food and mates.", "Common parts of a lemur diet in the wild include fruits, leaves, and other edible plant materials. Insects may also be on the menu, especially for the smaller lemurs.", "None", "In the wild, the breeding season lasts between seven and 21 days in May", 5000, "Endangered", "Starting in 1927, the Malagasy government has declared all lemurs as protected by establishing protected areas that are now classified under three categories: National Parks, Strict Nature Reserves, and Special Reserves. There are currently 18 national parks, 5 strict nature reserves, and 22 special reserves, as well as several other small private reserves, such as Berenty Reserve and Sainte Luce Private Reserve, both near Fort Dauphin. All protected areas, excluding the private reserves, comprise approximately 3% of the land surface of Madagascar and are managed by Madagascar National Parks, formerly known as l'Association Nationale pour la Gestion des Aires Protégées, as well as other non-governmental organizations, including Conservation International, the Wildlife Conservation Society, and the World Wide Fund for Nature. Most lemur species are covered by this network of protected areas, and a few species can be found in multiple parks or reserves.", 
 "Dell becomes carbon neutral by saving endangered lemurs (8/6/2008) 
Population of critically endangered lemurs discovered in Madagascar (7/22/2008)
Tiny lemur species discovered in Madagascar (7/14/2008)
Lemurs are key to health of Madagascar's rainforests (6/12/2008)
Madagascar signs big carbon deal to fund rainforest conservation (6/11/2008)"),
("Trichechus", "Manatee", "Manatees have a mass of 400 to 550 kilograms (880 to 1,210 lb), and mean length of 2.8 to 3.0 metres (9.2 to 9.8 ft), with maxima of 3.6 metres (12 ft) and 1,775 kilograms (3,913 lb) seen (the females tend to be larger and heavier). When born, baby manatees have an average mass of 30 kilograms (66 lb). They have a large, flexible, prehensile upper lip. They use the lip to gather food and eat, as well as using it for social interactions and communications. Manatees have shorter snouts than their fellow sirenians, the dugongs. Their small, widely spaced eyes have eyelids that close in a circular manner. The adults have no incisor or canine teeth, just a set of cheek teeth, which are not clearly differentiated into molars and premolars. These teeth are continuously replaced throughout life, with new teeth growing at the rear as older teeth fall out from farther forward in the mouth. This process is known as polyphyodonty and amongst the other mammals, only occurs in the kangaroo and elephant. At any given time, a manatee typically has no more than six teeth in each jaw of its mouth. Its tail is paddle-shaped, and is the clearest visible difference between manatees and dugongs; a dugong tail is fluked, similar in shape to a that of a whale. Females have two teats, one under each flipper, a characteristic that was used to make early links between the manatee and elephants.", "Manatees inhabit the shallow, marshy coastal areas and rivers of the Caribbean Sea and the Gulf of Mexico (T. manatus, West Indian manatee), the Amazon basin (T. inunguis, Amazonian manatee), and West Africa (T. senegalensis, West African manatee). West Indian manatees prefer warmer temperatures and are known to congregate in shallow waters. They frequently migrate through brackish water estuaries to freshwater springs. They cannot survive below 15 °C (60 °F). Their natural source for warmth during winter is warm, spring-fed rivers.", "Apart from mothers with their young, or males following a receptive female, manatees are generally solitary animals. Manatees spend approximately 50% of the day sleeping submerged, surfacing for air regularly at intervals of less than 20 minutes. The remainder of the time is mostly spent grazing in shallow waters at depths of 1–2 metres (3.3–6.6 ft). The Florida subspecies (T. m. latirostris) has been known to live up to 60 years.", "Manatees are herbivores and eat over 60 different freshwater (e.g. floating hyacinth, pickerel weed, alligator weed, water lettuce, hydrilla, water celery, musk grass, mangrove leaves) and saltwater plants (e.g. sea grasses, shoal grass, manatee grass, turtle grass, widgeon grass, sea clover, and marine algae). Using their divided upper lip, an adult manatee will commonly eat up to 10%-15% of their body weight (about 50 kg) per day. Consuming such an amount requires the manatee to graze for up to seven hours a day.[18] Manatees have been known to eat small amounts of fish from nets.", "The coast of the state of Georgia is usually the northernmost range of the West Indian manatees because their low metabolic rate does not protect them in cold water. Prolonged exposure to water temperatures below 20 °C (68 °F)  can bring about \"cold stress syndrome\" and death. Florida manatees can move freely between salinity extremes. Manatees have been seen as far north as Cape Cod, and in 1995 and again in 2006, one was seen in New York City and Rhode Island's Narragansett Bay. A manatee was spotted in the Wolf River harbor near the Mississippi River in downtown Memphis in 2006, though it was later found dead 10 miles downriver in McKellar Lake. The West Indian manatee migrates into Florida rivers, such as the Crystal, the Homosassa, and the Chassahowitzka Rivers. The headsprings of these rivers maintain a 22 °C (72 °F) temperature all year. During November to March, about 400 West Indian manatees (according to the National Wildlife Refuge) congregate in the rivers in Citrus County, Florida. During winter, manatees often congregate near the warm-water outflows of power plants along the coast of Florida instead of migrating south as they once did. Some conservationists are concerned that these manatees have become too reliant on these artificially warmed areas.[25] The U.S. Fish and Wildlife Service is trying to find a new way to heat the water for manatees that are dependent on plants that have closed. The main water treatment plant in Guyana has four manatees that keep storage canals clear of weeds; there are also some in the ponds of the national park in Georgetown, Guyana.", "No specific period", 6250, "Endangered", "The MV Freedom Star and MV Liberty Star, ships used by NASA to tow space shuttle solid rocket boosters back to Kennedy Space Center, are propelled only by water jets to protect the endangered manatee population that inhabits regions of the Banana River where the ships are based. Brazil outlawed hunting in 1973 in an effort to preserve the species. Deaths by boat strikes are still common.", " West Indian Manatee Facts and Pictures – National Geographic Kids. Kids.nationalgeographic.com. Retrieved on 2011-12-03.
Winger, Jennifer (2000). \"What's in a name? Manatees and Dugongs\". National Zoological Park. Friends of the National Zoo. Archived from the original on 30 December 2004. Retrieved 19 June 2015.
Walters, Martin; Johnson, Jinny (2003). Encyclopedia of Animals. Marks and Spencer p.l.c. p. 229. ISBN 1-84273-964-6.
Domning, D.P., 1994, Paleontology and evolution of sirenians: Status of knowledge and research needs, in Proceedings of the 1st International Manatee and Dugong Research Conference, Gainesville, Florida, 1–5
Penny, Malcolm (2002). The Secret Life of Kangaroos. Austin TX: Raintree Steck-Vaughn. ISBN 0-7398-4986-7.
Shoshani, J., ed. (2000). Elephants: Majestic Creatures of the Wild. Checkmark Books. ISBN 0-87596-143-6.
Best, Robin (1984). Macdonald, D., ed. The Encyclopedia of Mammals. New York: Facts on File. pp. 292–298. ISBN 0-87196-871-1.
\"The Florida Manatee (Trichechus manatus latirostrus).\". The Amy H Remley Foundation. Retrieved August 15, 2013.
Hautier, Lionel; Weisbecker, V; Sánchez-Villagra, M. R.; Goswami, A; Asher, R. J. (2010). \"Skeletal development in sloths and the evolution of mammalian vertebral patterning\". PNAS. 107 (44): 18903–18908. doi:10.1073/pnas.1010335107. PMC 2973901 PMID 20956304. Retrieved 25 July 2013.
\"Sticking Their Necks out for Evolution: Why Sloths and Manatees Have Unusually Long (or Short) Necks\". May 6th 2011. Science Daily. Retrieved 25 July 2013."),
("Folivara", "Sloth", "With their long arms and shaggy fur, they resemble monkeys, but they are actually related to armadillos and anteaters. They can be 2 to 2.5 feet (0.6 to 0.8 meters) long and, depending on species, weigh from 8 to 17 pounds (3.6 to 7.7 kilograms).", "Sloths live in the tropical forests of Central and South America.", "Sloths move only when necessary and even then very slowly; they have about a quarter as much muscle tissue as other animals of similar weight. They can move at a marginally higher speed if they are in immediate danger from a predator (4 m or 13 ft per minute for the three-toed sloth), but they burn large amounts of energy doing so. Their specialised hands and feet have long, curved claws to allow them to hang upside down from branches without effort.[13] While they sometimes sit on top of branches, they usually eat, sleep, and even give birth hanging from limbs. They sometimes remain hanging from branches after death. On the ground, the maximum speed of the three-toed sloth is 2 m or 6.5 ft per minute.", "Sloths are classified as folivores, as the bulk of their diets consist of buds, tender shoots, and leaves, mainly of Cecropia trees. Some two-toed sloths have been documented as eating insects, small reptiles, and birds as a small supplement to their diets.", "None", "Late summer and early fall", 3200, "Critically Endangered", "In Costa Rica, the Aviarios Sloth Sanctuary cares for wounded and abandoned sloths. About 130 animals have been released back into the wild. However, a report in May 2016 featured two former veterinarians at the facility who were intensely critical of the sanctuary's efforts, accusing the sanctuary of mistreating the animals. The Sloth Institute Costa Rica is also known for caring, rehabilitating and releasing sloths back into the wild.", 
 "Gardner, A. (2005). Wilson, D.E.; Reeder, D.M., eds. Mammal Species of the World: A Taxonomic and Geographic Reference (3rd ed.). Johns Hopkins University Press. pp. 100–101. ISBN 978-0-8018-8221-0. OCLC 62265494.
Horne, Genevieve (April 14, 2010). \"Sloth fur has symbiotic relationship with green algae\". BioMed Central. Springer Science+Business Media. Retrieved February 15, 2013.
Oxford English Dictionary, entry \"sloth\"
http://www.etymonline.com/index.php?term=sloth
The pronunciation /ˈsloʊθ/ is commonest in British English. The pronunciation /ˈslɒθ/ is used in most Englishes.
Heymann, E. W.; Flores Amasifuén, C.; Shahuano Tello, N.; Tirado Herrera, E. T. & Stojan-Dolar, M (2010). \"Disgusting appetite: Two-toed sloths feeding in human latrines\". Mammalian Biology. 76 (1): 84–86. doi:10.1016/j.mambio.2010.03.003.
\"Animals of the Rainforest-Sloth\". caltech.edu.
Eisenberg, John F.; Redford, Kent H. (May 15, 2000). Mammals of the Neotropics, Volume 3: The Central Neotropics: Ecuador, Peru, Bolivia, Brazil. University of Chicago Press. pp. 624 (see p. 96). ISBN 978-0-226-19542-1. OCLC 493329394.
Chiarello, A. & Moraes-Barros, N. (2014). \"Bradypus torquatus\". IUCN Red List of Threatened Species. Version 2014.1. International Union for Conservation of Nature. Retrieved 2015-09-13.
\"Rainforest Canopy—Animals\". Retrieved 2009-12-30."),
("Heloderma suspectum", "Gila monster", "In this species, the largest extant lizard native to North America north of the Mexican border (non-natives like green iguanas are larger), snout-to-vent length is from 26 to 36 cm (10 to 14 in). The tail is about 20% of the body size and the largest specimens may reach 51 to 56 cm (20 to 22 in) in total length. Body mass is typically in the range of 350 to 700 g (0.77 to 1.54 lb), with 11 males having been found to average 468 g (1.032 lb). Reportedly, the very heaviest, largest specimens can weigh as much as 2,300 g (5.1 lb)", "The Gila monster is found in the Southwestern United States and Mexico, a range including Sonora, Arizona, parts of California, Nevada, Utah, and New Mexico (potentially including Baja California). They inhabit scrubland, succulent desert, and oak woodland, seeking shelter in burrows, thickets, and under rocks in locations with ready access to moisture. In fact, Gila monsters seem to like water and can be observed immersing themselves in puddles of water after a summer rain. They avoid living in open areas such as flats and farmland", "Gila monsters spend 90% of their time underground in burrows or rocky shelters.[citation needed] They are active in the morning during the dry season (spring and early summer); later in the summer, they may be active on warm nights or after a thunderstorm. They maintain a surface body temperature of about 30 °C (86 °F). Gila monsters are slow in sprinting ability, but they have relatively high endurance and maximal aerobic capacity (VO2 max) for a lizard", "The Gila monster eats small birds, mammals, frogs, lizards, insects, and carrion. The Gila monster feeds primarily on bird and reptile eggs, and eats infrequently (only five to ten times a year in the wild), but when it does feed, it may eat up to one-third of its body mass. It uses its extremely acute sense of smell to locate prey, especially eggs. Its sense of smell is so keen, it can locate and dig up chicken eggs buried 15 cm (6 in) deep and accurately follow a trail made by rolling an egg.", "None", "Early summer", 3000, "Near Threatened", "Collection of Gila monsters is prohibited by laws and regulations throughout the range in the United States and Mexico. Sizable areas of habitat are protected from development in national parks and monuments and in federal wilderness areas", 
 "\"2007 IUCN Red List – Search\". Iucnredlist.org. Retrieved 2008-09-19.
Fry, Bryan G.; et al. (February 2006). \"Early evolution of the venom system in lizards and snakes\". Nature. 439 (7076): 584–588. doi:10.1038/nature04328. PMID 16292255. Retrieved 2008-05-14.
\"Heloderma suspectum\". Integrated Taxonomic Information System. Retrieved 19 May 2008.
Christel CM, DeNardo DF, Secor SM (October 2007). \"Metabolic and digestive response to food ingestion in a binge-feeding lizard, the Gila monster (Heloderma suspectum)\". Journal of Experimental Biology. 210: 3430–9. doi:10.1242/jeb.004820. PMID 17872997.
Davis, Jon R.; DeNardo, Dale F. (2010). \"Seasonal patterns of body condition, hydration state, and activity of Gila monsters (Heloderma suspectum) at a Sonoran Desert site\". Journal of Herpetology. 44 (1): 83–93. doi:10.1670/08-263.1.
Beck, D. D. (2005). Biology of Gila monsters and beaded lizards (Vol. 9). University of California Press.
King, Ruth Allen; Pianka, Eric R.; King, Dennis (2004). Varanoid Lizards of the World. Bloomington: Indiana University Press. ISBN 0-253-34366-6.
Mattison, Chris (1998). Lizards of the World. London: Blandford. ISBN 0-7137-2357-2.
\"Online Etymology Dictionary\". Retrieved 2008-06-10.
Stebbins, Robert (2003). Western Reptiles and Amphibians. New York: Houghton Mifflin. pp. 338–339, 537. ISBN 0-395-98272-3.");

INSERT INTO user_human_activity (name, description, activity_date, locID) VALUES
("Fracking", "Exxon opened a new fracking location in the park", "2017-01-15", 1),
("Logging", "Large logging company got permit to clearcut forest", "2017-03-17", 1),
("Bicycling", "Bicycle path has been built along the river", "2015-04-25", 1),
("Commercial Fishing", "Commercial fishing operations have started operating on the river", "2016-07-11", 1),
("Housing Development", "A housing development is being constructed on the edge of the forest", "2017-02-16", 1),
("Fracking", "Exxon opened a new fracking location in the park", "2017-01-15", 2),
("Logging", "Large logging information get permit to clearcut forest", "2017-03-17", 2),
("Bicycling", "Bicycle path has been built along the river", "2015-04-25", 2),
("Commercial Fishing", "Commercial fishing operations have started operating on the river", "2016-07-11", 3),
("Housing Development", "A housing development is being constructed on the edge of the forest", "2017-02-16", 3),
("Fracking", "Exxon opened a new fracking location in the park", "2017-01-15", 4),
("Logging", "Large logging information get permit to clearcut forest", "2017-03-17", 4);

INSERT INTO users (username, password) VALUES
("tester", "password");

INSERT INTO locations (id, formattedAddress, latitude, longitude) VALUES
(1, "Ohiopyle, PA, USA", 39.871742, -79.49226059999999),
(2, "Kruger National Park, South Africa", -23.9883848, 31.5547402),
(3, "Patagonia", -41.8101472, -68.9062689),
(4, "Sichuan, China", 30.651226, 104.075881);

INSERT INTO user_locs (username, locID) VALUES
("tester", 1), ("tester", 2), ("tester", 3), ("tester", 4);