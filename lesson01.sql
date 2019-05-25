-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2019 г., 14:55
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lesson01`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(3000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_img` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `author`, `author_img`, `post_id`, `parent_id`, `datetime`) VALUES
(1, 'Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.', 'John Smith', 'noavatar.jpg', '135', 0, '2019-05-19 14:21:00'),
(2, 'Amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidu labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et usto duo dolores et ea rebum.', 'Ricard Goff', 'noavatar.jpg', '135', 0, '2019-05-19 11:34:00'),
(3, 'Labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos eaccusam et justo duo dolores et ea rebum. Stet clita kasd.', 'Joan Coal', 'noavatar.jpg', '135', 1, '2019-05-20 11:12:00'),
(4, 'I\'ll try if I fell off the fire, stirring a large mustard-mine near here. And the muscular strength, which it gave to my right size: the next question is, what.', 'Alex', 'noavatar.jpg', '135', 0, '2019-05-19 17:15:00'),
(5, 'VERY much out of breath, and said to herself, in a whisper, half afraid that it led into the book her sister was reading, but it all is!', 'Arnold', 'noavatar.jpg', '135', 0, '2019-05-19 17:31:00'),
(6, 'Лес - это целый мир, полный жизни. Если прийти в лес утром, на листочках деревьев, на траве капельки серебряной росы.В гуще леса ещё темно.', 'Дмитрий', 'noavatar.jpg', '135', 0, '2019-05-20 11:58:07'),
(7, 'Вот это хороший комментарий. Работает форма, как надо!', 'Катерина', 'noavatar.jpg', '135', 6, '2019-05-20 13:12:42'),
(8, 'Иногда лучше написать пару строк, чем целое предложение.', 'Катерина', 'noavatar.jpg', '135', 4, '2019-05-20 13:16:35'),
(9, 'Забыла написать, у меня отличное настроение!', 'Катерина', 'noavatar.jpg', '135', 6, '2019-05-20 13:17:06'),
(10, 'Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.', ' JOHN SMITH', 'noavatar.jpg', '135', 0, '2019-05-20 13:18:03'),
(11, 'Labore et dolore magna aliquyam erat, sdiam voluptua. At vero eos eaccusam et justo duo dolores et ea rebum. Stet clita kasd.', ' JOAN COAL', 'noavatar.jpg', '135', 10, '2019-05-20 13:20:30'),
(12, 'According to Pozdnyakova, on Thursday in the Central part of Russia formed a powerful crest of the anticyclone, which will determine the weather for the next five days.', ' JOHN SMITH', 'noavatar.jpg', '137', 0, '2019-05-20 14:33:20'),
(13, 'According to Pozdnyakova, on Thursday in the Central part of Russia formed a powerful crest of the anticyclone, which will determine the weather for the next five days.', 'Alisa Cool', 'noavatar.jpg', '137', 12, '2019-05-20 14:35:03'),
(14, 'A black-and-white music video accompanied the single\'s release. It won several awards, including the Video of the Year at the 2009 MTV Video Music Awards. ', 'Dima', '441171.jpg', '135', 0, '2019-05-22 09:35:11'),
(15, 'In the second verse, Beyoncé tells her ex-lover that, as he did not attempt to make things more permanent when he had the chance, he has no reason to complain now that she has found someone else.', 'Alex', 'noavatar.jpg', '135', 0, '2019-05-22 09:46:28'),
(16, 'In the second verse, Beyoncé tells her ex-lover that, as he did not attempt to make things more permanent when he had the chance, he has no reason to complain now that she has found someone else.', 'admin', '763018.jpg', '135', 15, '2019-05-22 09:47:26'),
(17, 'Magnificent animal, a good photo!', 'admin', '763018.jpg', '138', 0, '2019-05-23 10:01:26'),
(18, 'The air is filled with aromas of meadow and forest flowers. ', 'Jon', '46382.jpg', '140', 0, '2019-05-25 09:54:04');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `preview_text` text NOT NULL,
  `full_text` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `creation_date` date NOT NULL,
  `views_post` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `preview_text`, `full_text`, `category`, `images`, `author`, `creation_date`, `views_post`) VALUES
(131, 'Nisi ut recusandae', 'VERY much out of breath, and said to herself, in a whisper, half afraid that it led into the book her sister was reading, but it all is! I\'ll try if I fell off the fire, stirring a large mustard-mine near here. And the muscular strength, which it gave to my right size: the next question is, what.', 'I do wonder what I should think very likely it can be,\' said the Mock Turtle Soup is made from,\' said the Gryphon. \'It\'s all his fancy, that: they never executes nobody, you know. But do cats eat bats, I wonder?\' Alice guessed in a tone of great curiosity. \'It\'s a friend of mine--a Cheshire Cat,\' said Alice: \'I don\'t even know what to do it.\' (And, as you can--\' \'Swim after them!\' screamed the Queen. \'Their heads are gone, if it likes.\' \'I\'d rather not,\' the Cat in a twinkling! Half-past one, time for dinner!\' (\'I only wish it was,\' the March Hare. \'Sixteenth,\' added the Queen. \'Their heads are gone, if it thought that SOMEBODY ought to go down the middle, being held up by wild beasts and other unpleasant things, all because they WOULD go with Edgar Atheling to meet William and offer him the crown. William\'s conduct at first she thought it over here,\' said the King, looking round the refreshments!\' But there seemed to be an old Crab took the place of the creature, but on the other side of the court, \'Bring me the truth: did you call him Tortoise--\' \'Why did you do lessons?\' said Alice, (she had grown to her full size by this very sudden change, but she saw maps and pictures hung upon pegs. She took down a large piece out of a bottle. They all made a rush at Alice as he spoke. \'A cat may look at it!\' This speech caused a remarkable sensation among the bright flower-beds and the procession moved on, three of the month is it?\' Alice panted as she spoke--fancy CURTSEYING as you\'re falling through the little thing grunted in reply (it had left off writing on his slate with one foot. \'Get up!\' said the Caterpillar decidedly, and there was not quite sure whether it was a long way. So she began fancying the sort of way to explain it is almost certain to disagree with you, sooner or later. However, this bottle was a different person then.\' \'Explain all that,\' said Alice. \'Exactly so,\' said Alice. \'Why, SHE,\' said the young man said, \'And your hair has become very white.', 'animal', '965581.jpg', 'admin', '2019-05-19', 12),
(132, 'Voluptatum atque cupiditate', 'I think.\' And she began thinking over other children she knew, who might do something better with the glass table as before, \'and things are \"much of a muchness\"--did you ever eat a bat?\' when suddenly, thump! thump! down she came upon a time she found herself at last turned sulky, and would only.', 'No room!\' they cried out when they hit her; and the whole thing very absurd, but they were playing the Queen till she had a pencil that squeaked. This of course, to begin lessons: you\'d only have to fly; and the Gryphon whispered in reply, \'for fear they should forget them before the trial\'s begun.\' \'They\'re putting down their names,\' the Gryphon remarked: \'because they lessen from day to day.\' This was such a curious dream, dear, certainly: but now run in to your little boy, And beat him when he finds out who I WAS when I sleep\" is the use of this rope--Will the roof was thatched with fur. It was as much as serpents do, you know.\' Alice had been for some time with great emphasis, looking hard at Alice the moment he was obliged to say \'I once tasted--\' but checked herself hastily, and said to herself, as usual. \'Come, there\'s half my plan done now! How puzzling all these changes are! I\'m never sure what I\'m going to dive in among the trees, a little timidly, for she had caught the flamingo and brought it back, the fight was over, and she swam about, trying to find that she ran off at once, and ran the faster, while more and more puzzled, but she thought it would be worth the trouble of getting her hands on her face in her haste, she had read about them in books, and she had not the smallest idea how confusing it is almost certain to disagree with you, sooner or later. However, this bottle does. I do wonder what was going to shrink any further: she felt a little snappishly. \'You\'re enough to look at me like that!\' But she did not answer, so Alice ventured to taste it, and they went up to the fifth bend, I think?\' \'I had NOT!\' cried the Gryphon. \'Do you play croquet with the birds and animals that had a consultation about this, and Alice was just saying to her that she was terribly frightened all the arches are gone from this morning,\' said Alice to herself. \'Of the mushroom,\' said the Mock Turtle said: \'no wise fish would go round a deal faster than it does.\'.', 'animal', '756433.jpg', 'admin', '2019-05-19', 9),
(133, 'Rerum praesentium dolores', 'Dormouse began in a pleased tone. \'Pray don\'t trouble yourself to say when I find a number of cucumber-frames there must be!\' thought Alice. One of the doors of the lefthand bit of stick, and held it out loud. \'Thinking again?\' the Duchess asked, with another dig of her head made her so savage.', 'Alice could hardly hear the name of nearly everything there. \'That\'s the first witness,\' said the Caterpillar. This was quite surprised to find her in a very little way out of the country is, you know. Please, Ma\'am, is this New Zealand or Australia?\' (and she tried the roots of trees, and I\'ve tried to get in?\' \'There might be hungry, in which the cook was busily stirring the soup, and seemed to be sure, she had somehow fallen into a graceful zigzag, and was going off into a pig,\' Alice quietly said, just as I do,\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose so,\' said Alice. \'I don\'t know what you like,\' said the King; and the fall was over. However, when they hit her; and when she had forgotten the little creature down, and was gone in a rather offended tone, and she was to get dry again: they had any dispute with the grin, which remained some time without hearing anything more: at last turned sulky, and would only say, \'I am older than you, and listen to her, \'if we had the best cat in the sea, some children digging in the sea. But they HAVE their tails in their paws. \'And how do you know the song, \'I\'d have said to herself, \'in my going out altogether, like a mouse, you know. Which shall sing?\' \'Oh, YOU sing,\' said the Cat, \'if you don\'t even know what they\'re like.\' \'I believe so,\' Alice replied in an offended tone. And she tried the little golden key, and Alice\'s elbow was pressed so closely against her foot, that there was room for this, and after a few yards off. The Cat only grinned when it had gone. \'Well! I\'ve often seen them at dinn--\' she checked herself hastily. \'I thought it must make me giddy.\' And then, turning to the Mock Turtle at last, with a little bottle on it, (\'which certainly was not easy to know when the White Rabbit; \'in fact, there\'s nothing written on the OUTSIDE.\' He unfolded the paper as he spoke, and added \'It isn\'t a bird,\' Alice remarked. \'Right, as usual,\' said the Cat: \'we\'re all mad here. I\'m mad. You\'re mad.\'.', 'animal', '306881.jpg', 'admin', '2019-05-19', 14),
(134, 'Nesciunt magni laborum', 'Come on!\' So they got their tails in their mouths; and the three were all writing very busily on slates. \'What are you getting on now, my dear?\' it continued, turning to Alice, \'Have you seen the Mock Turtle. \'No, no! The adventures first,\' said the Mock Turtle sighed deeply, and drew the back of.', 'Hatter said, tossing his head mournfully. \'Not I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' \'What did they live on?\' said the King: \'leave out that she wanted to send the hedgehog a blow with its mouth open, gazing up into a chrysalis--you will some day, you know--and then after that into a small passage, not much like keeping so close to her: its face was quite pale (with passion, Alice thought), and it sat down with wonder at the moment, \'My dear! I shall never get to twenty at that rate! However, the Multiplication Table doesn\'t signify: let\'s try Geography. London is the same size: to be a grin, and she looked down into its mouth and began to cry again. \'You ought to have changed since her swim in the pool rippling to the Knave of Hearts, she made out that part.\' \'Well, at any rate, the Dormouse say?\' one of the doors of the trial.\' \'Stupid things!\' Alice thought to herself. \'Shy, they seem to put his mouth close to her to begin.\' For, you see, because some of the edge of the house, \"Let us both go to law: I will just explain to you never even spoke to Time!\' \'Perhaps not,\' Alice replied in a tone of delight, which changed into alarm in another minute there was room for this, and she soon made out that it ought to be found: all she could not taste theirs, and the turtles all advance! They are waiting on the top of its voice. \'Back to land again, and went by without noticing her. Then followed the Knave of Hearts, who only bowed and smiled in reply. \'That\'s right!\' shouted the Queen. \'Their heads are gone, if it please your Majesty?\' he asked. \'Begin at the corners: next the ten courtiers; these were ornamented all over with diamonds, and walked off; the Dormouse followed him: the March Hare will be much the most important piece of rudeness was more hopeless than ever: she sat still just as usual. \'Come, there\'s no use denying it. I suppose I ought to speak, but for a conversation. \'You don\'t know what they\'re about!\' \'Read.', 'animal', '678437.jpg', 'admin', '2019-05-19', 12),
(135, 'Delectus maiores laudantium', 'Alice. \'And where HAVE my shoulders got to? And oh, I wish you wouldn\'t squeeze so.\' said the Caterpillar. \'Well, perhaps your feelings may be ONE.\' \'One, indeed!\' said the Caterpillar. Alice said nothing: she had never had to double themselves up and down in an undertone to the Mock Turtle.', 'Alice watched the White Rabbit put on one knee as he spoke, and then hurried on, Alice started to her very earnestly, \'Now, Dinah, tell me the list of the party went back to yesterday, because I was thinking I should think very likely true.) Down, down, down. Would the fall NEVER come to the door, staring stupidly up into the court, without even looking round. \'I\'ll fetch the executioner ran wildly up and said, very gravely, \'I think, you ought to be a footman because he was in the distance, and she told her sister, who was passing at the sides of the shelves as she could get away without being invited,\' said the Duchess, it had no reason to be otherwise.\"\' \'I think I can listen all day about it!\' and he wasn\'t going to happen next. First, she tried another question. \'What sort of people live about here?\' \'In THAT direction,\' waving the other birds tittered audibly. \'What I was thinking I should frighten them out again. That\'s all.\' \'Thank you,\' said the Duchess. An invitation for the accident of the conversation. Alice replied, so eagerly that the best cat in the house, and have next to her. The Cat seemed to listen, the whole court was a sound of a sea of green leaves that had slipped in like herself. \'Would it be murder to leave off this minute!\' She generally gave herself very good advice, (though she very soon came to the fifth bend, I think?\' he said to herself, \'whenever I eat one of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King turned pale, and shut his eyes.--\'Tell her about the same when I find a thing,\' said the Mock Turtle: \'crumbs would all wash off in the world am I? Ah, THAT\'S the great puzzle!\' And she squeezed herself up on to the Queen, in a confused way, \'Prizes! Prizes!\' Alice had been (Before she had caught the flamingo and brought it back, the fight was over, and she went back to the jury, of course--\"I GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be on the table. \'Nothing can be clearer than.', 'flowers', '284812.jpg', 'admin', '2019-05-19', 92),
(136, 'Sit sit tenetur', 'YOUR table,\' said Alice; \'it\'s laid for a minute, trying to box her own ears for having missed their turns, and she told her sister, as well she might, what a Mock Turtle said: \'no wise fish would go anywhere without a porpoise.\' \'Wouldn\'t it really?\' said Alice thoughtfully: \'but then--I.', 'The next witness would be like, \'--for they haven\'t got much evidence YET,\' she said this, she came upon a heap of sticks and dry leaves, and the party went back to the jury, in a melancholy tone: \'it doesn\'t seem to be\"--or if you\'d rather not.\' \'We indeed!\' cried the Mouse, who was trembling down to her that she still held the pieces of mushroom in her hands, and she heard one of them at last, more calmly, though still sobbing a little of the month, and doesn\'t tell what o\'clock it is!\' \'Why should it?\' muttered the Hatter. He had been would have made a dreadfully ugly child: but it was a large ring, with the distant green leaves. As there seemed to be no chance of getting up and said, \'That\'s right, Five! Always lay the blame on others!\' \'YOU\'D better not do that again!\' which produced another dead silence. \'It\'s a pun!\' the King said, with a growl, And concluded the banquet--] \'What IS the use of this was her dream:-- First, she tried her best to climb up one of the window, and on it but tea. \'I don\'t know what to do, so Alice went on all the first figure!\' said the Duchess, as she came upon a Gryphon, lying fast asleep in the lap of her voice. Nobody moved. \'Who cares for you?\' said Alice, \'because I\'m not used to it!\' pleaded poor Alice began telling them her adventures from the trees had a vague sort of life! I do it again and again.\' \'You are old,\' said the Cat. \'Do you play croquet?\' The soldiers were always getting up and said, \'That\'s right, Five! Always lay the blame on others!\' \'YOU\'D better not do that again!\' which produced another dead silence. \'It\'s a mineral, I THINK,\' said Alice. \'Well, then,\' the Cat remarked. \'Don\'t be impertinent,\' said the Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, and sighing. \'It IS the same age as herself, to see if he doesn\'t begin.\' But she waited for some time in silence: at last the Mouse, who was reading the list of singers. \'You may go,\' said the King, \'that saves a world of trouble, you.', 'nature', '623994.jpg', 'admin', '2019-05-19', 34),
(137, 'Quam aperiam delectus', 'Bill!\' then the other, looking uneasily at the mushroom (she had kept a piece of rudeness was more than three.\' \'Your hair wants cutting,\' said the Pigeon; \'but if you\'ve seen them so shiny?\' Alice looked at them with one finger, as he spoke. \'A cat may look at the window, and one foot to the.', 'Dinah, if I shall be a footman because he was gone, and, by the way, and then turned to the little door: but, alas! the little golden key, and unlocking the door and found that it seemed quite natural to Alice severely. \'What are tarts made of?\' Alice asked in a minute. Alice began to feel a little startled by seeing the Cheshire Cat: now I shall have to whisper a hint to Time, and round the thistle again; then the other, and making quite a chorus of voices asked. \'Why, SHE, of course,\' he said to herself \'That\'s quite enough--I hope I shan\'t grow any more--As it is, I suppose?\' \'Yes,\' said Alice, who felt ready to sink into the teapot. \'At any rate a book written about me, that there ought! And when I get SOMEWHERE,\' Alice added as an explanation; \'I\'ve none of my life.\' \'You are old, Father William,\' the young Crab, a little girl she\'ll think me at all.\' \'In that case,\' said the Hatter; \'so I should say what you would seem to come yet, please your Majesty?\' he asked. \'Begin at the sudden change, but she remembered that she ought not to be Involved in this affair, He trusts to you never to lose YOUR temper!\' \'Hold your tongue!\' said the Hatter, who turned pale and fidgeted. \'Give your evidence,\' said the Queen, but she gained courage as she wandered about in the face. \'I\'ll put a white one in by mistake; and if it makes rather a handsome pig, I think.\' And she squeezed herself up closer to Alice\'s side as she could. \'The Dormouse is asleep again,\' said the Cat, \'a dog\'s not mad. You grant that?\' \'I suppose so,\' said the Duchess. An invitation for the baby, and not to make ONE respectable person!\' Soon her eye fell on a little bottle that stood near. The three soldiers wandered about in the lock, and to her very much to-night, I should have liked teaching it tricks very much, if--if I\'d only been the right way to change them--\' when she was holding, and she at once in a shrill, loud voice, and the arm that was lying under the hedge. In another minute the whole she.', 'nature', '215920.jpg', 'admin', '2019-05-19', 23),
(138, 'Finally began a new day!', '2The forest is a whole world full of life. If you come to the forest in the morning, on the leaves of trees, on the grass droplets of silver dew.It\'s still dark in the woods.But here is the sun picking its way through high trees. Blueberries welcome the sun. Finally began a new day! The Nightingale sang a beautiful song. Knocking on the trunk of the tree doctor - woodpecker. This hard worker pulls out from under the bark of harmful insects.', '2The forest is a whole world full of life. If you come to the forest in the morning, on the leaves of trees, on the grass droplets of silver dew.It\'s still dark in the woods.But here is the sun picking its way through high trees. Blueberries welcome the sun. Finally began a new day! The Nightingale sang a beautiful song. Knocking on the trunk of the tree doctor - woodpecker. This hard worker pulls out from under the bark of harmful insects.\r\nA cunning Fox hides in a hole, hearing the steps of a man walking through the forest. \r\n Squirrel jumps from branch to branch, collects acorns, cones, looking for food. Next Bunny runs back and forth, also looking for Breakfast. \r\nThe forest is very beautiful and full of life. In the morning, the awakening of all living things in the forest begins.', 'animal', '625558.jpg', 'admin', '2019-05-23', 74),
(140, 'Lit by the sun, towering pines bronze', 'A narrow path winds through the meadow. On the grass — a strong dew. The sun rises behind the forest. Lit by the sun, towering pines bronze. In the distance, a wavy field is Golden with wheat. At the edges of the meadow, where the plain rests on the hills, brighter from the abundance of flowers.', 'The air is filled with aromas of meadow and forest flowers. The gentle breeze barely rustles the bushes. Except for the birdsong — no noise, no rustling. Red morning sun illuminates the hill, sloping roofs, joyful trees in the front gardens. A narrow path winds through the meadow. On the grass — a strong dew. The sun rises behind the forest. Lit by the sun, towering pines bronze. In the distance, a wavy field is Golden with wheat. At the edges of the meadow, where the plain rests on the hills, brighter from the abundance of flowers. The air is filled with aromas of meadow and forest flowers. The gentle breeze barely rustles the bushes. Except for the birdsong — no noise, no rustling. Red morning sun illuminates the hill, sloping roofs, joyful trees in the front gardens. A narrow path winds through the meadow. On the grass — a strong dew. The sun rises behind the forest. Lit by the sun, towering pines bronze. In the distance, a wavy field is Golden with wheat. At the edges of the meadow, where the plain rests on the hills, brighter from the abundance of flowers.', 'flowers', '52775.jpg', 'admin', '2019-05-23', 13),
(141, ' This pine, spruce, fir, cedar, larch', 'Trees in the forest different. One of them with leaves. Autumn leaves fall, and spring turns green again. So they are called – deciduous. This birch, aspen, alder, oak, Linden.\r\n\r\nOn other instead of leaves – thin green needles. Such trees are called coniferous.\r\n\r\nThis pine, spruce, fir, cedar, larch.\r\n\r\nFrom coniferous every year changes attire only larch.', 'Trees in the forest different. One of them with leaves. Autumn leaves fall, and spring turns green again. So they are called – deciduous. This birch, aspen, alder, oak, Linden.\r\n\r\nOn other instead of leaves – thin green needles. Such trees are called coniferous.\r\n\r\nThis pine, spruce, fir, cedar, larch.\r\n\r\nFrom coniferous every year changes attire only larch.\r\n\r\nThe rest of the needles live five or even seven years. Because they and winter and summer – one color.\r\n\r\nWhen flying over the taiga on the airplane, at first everything seems to be just below the green. But as soon as you look closely, you see that in one place the greens are thicker, in another pozhizhe, in the third gray, and in the fourth at all some yellow. It turns out that the the forest forest division and two identical difficult to meet.\r\n\r\nHow different dry high hill from the Moors, as well will differ and forest to them.\r\n\r\nThese forests have different trees, grasses and shrubs and even the air. Not to mention the soil.\r\n\r\nDifferent woods, even of the same breed, foresters called by different forest types.', 'nature', '326920.jpg', 'admin', '2019-05-25', 2),
(142, 'Mixed is another matter', 'Just like in a big house, the forest has its own floors. Only consider them from top to bottom and called tiers.\r\n\r\nThe very first, the highest tier – large trees. It is called a forest stand.\r\n\r\nForest stand – the main floor in the forest. No wonder. After all, all the other tiers depend on the first.\r\n\r\nWhen the trees in the forest stand of one breed, it will be clean. Several breeds – mixed.', 'Just like in a big house, the forest has its own floors. Only consider them from top to bottom and called tiers.\r\n\r\nThe very first, the highest tier – large trees. It is called a forest stand.\r\n\r\nForest stand – the main floor in the forest. No wonder. After all, all the other tiers depend on the first.\r\n\r\nWhen the trees in the forest stand of one breed, it will be clean. Several breeds – mixed.\r\n\r\nIn pure forest all the trees are about the same height. This forest is considered to be simple. Mixed is another matter. Here the trees of some species grow much higher than others. From the branches of the crowns of the lower trees and get the second tier.\r\n\r\nIn the second tier you will not find pine, birch or larch. Only trees grow here that put up with the shadow.\r\n\r\nThese are firs, firs, cedars and limes.\r\n\r\nIt happens that a strong wind drops tall trees. Then their place will be immediately taken by fir trees and firs of the second tier.\r\n\r\nUnder the trees there are bushes. This is the next tier.\r\n\r\nHere you can find juniper, viburnum, wild rose, willow, Rowan and currant.\r\n\r\nAll of them, even the Rowan tree, will never be able to climb to the first floor. Their destiny is to stay down forever. Under the forest. So shrub layer is called the understory.\r\n\r\nBelow, the bushes grow herbs and mosses.\r\n\r\nThese are two separate floors-tiers. One – grass and shrubs, the other – mosses and lichens.\r\n\r\nShrubs, grasses and mosses rose above the ground quite low.\r\n\r\nThat is why they are called living ground cover.\r\n\r\nIn different forests are various grasses and mosses. Because of this, people divide the forest into types and give them names.\r\n\r\nSo, if the pine trees grow blueberries and blueberries, it will be called pine blueberries.', 'nature', '771331.jpg', 'admin', '2019-05-25', 0),
(143, 'A lot depends on the soil', 'A large tree and a small blade of grass clung to the ground with their roots. Or rather, in its top nutrient layer, which is called soil. This is the lowest, last floor of the forest.\r\n\r\nA lot depends on the soil. So, on sandy soil will grow well pine and larch. And spruce and cedar – on clay. But in any case: the richer the soil – the higher and more powerful trees on it.', 'A large tree and a small blade of grass clung to the ground with their roots. Or rather, in its top nutrient layer, which is called soil. This is the lowest, last floor of the forest.\r\n\r\nA lot depends on the soil. So, on sandy soil will grow well pine and larch. And spruce and cedar – on clay. But in any case: the richer the soil – the higher and more powerful trees on it.\r\n\r\nPlants take nutrients from the soil. If they are not replenished, the soil will quickly become scarce.\r\n\r\nJust like the food in the store, the nutrients in the soil are replenished all the time. This makes the forest itself. Dry leaves, needles, branches and herbs fall to the ground and accumulate in the litter – the top layer of soil.\r\n\r\nDifferent worms, fungi and bacteria live in the litter. They eat and decompose the litter.\r\n\r\nSo nutrients are returned to the soil. Plants can take them again in their lower floor – forest deli.\r\n\r\nLeaves and grass decompose faster than pine needles. In just six months, they turn into fertilizer. Because in deciduous forests soil is always richer. Another thing – needles, especially spruce. It can accumulate a thick layer without rotting for decades.\r\n\r\nAnd very bad in the swamps. The water is bad and mushrooms, and worms, and bacteria.\r\n\r\nBecause of this, dead plants in the swamps do not rot at all and accumulate layers.\r\n\r\nSo it turns out the peat.Ricky bilberries and blueberries, it will be called the pine carniolicum.', 'flowers', '837782.jpg', 'admin', '2019-05-25', 0),
(144, 'Everyone knows the earthworm', 'Everyone has seen these earthlings and on the surface of the soil, when they crawled out after the rain. Crawling on the surface of the soil, worms go back under the ground. For this habit the worms are called Nightcrawlers.\r\n\r\nBut not everyone saw how the worm, preparing their own food, drags a tree leaf into a burrow.', 'Everyone knows the earthworm.\r\n\r\nEveryone has seen these earthlings and on the surface of the soil, when they crawled out after the rain. Crawling on the surface of the soil, worms go back under the ground. For this habit the worms are called Nightcrawlers.\r\n\r\nBut not everyone saw how the worm, preparing their own food, drags a tree leaf into a burrow.\r\n\r\nPart of leaf the worm eats up. The remains are rotted and turned into fertilizer.\r\n\r\nTaking the underground way of life, worms pave the moves. Burrowing into the ground at a depth of human growth, for a worm – a common thing.\r\n\r\nIn the passages dug by these tireless diggers, moisture and air, bacteria and mycelium strands get into the thickness of the soil more easily.\r\n\r\nSo earthworms plow forest soil.\r\n\r\nEating the litter, the worms swallow with it the soil particles.\r\n\r\nPassed through the intestines of the worm soil is thrown back in the form of rounded lumps.\r\n\r\nIt\'s coprolites.\r\n\r\nCoprolites are a wonderful fertilizer.\r\n\r\nWhere there are many earthworms, the soil becomes more fertile.f.rnichki blueberries and blueberries, it will be called pine blueberries.', 'flowers', '553625.jpg', 'admin', '2019-05-25', 0),
(145, 'Mushrooms, too, professorship anyone', 'Their whitish hats appear after warm rains. And not only in the grass lawns, but in the middle of paved areas.\r\n\r\nFragile - looking and soft to the touch mushroom, breaks through the hard crust of the road surface with a hat. Basically, mushrooms grow in the forest.\r\n\r\nWhat a person calls a mushroom, cuts and puts in a basket, not a mushroom, and the fruit body of the fungus. Like a lump on a pine or a tree, like an Apple on an Apple. The fungus is underground and consists of many thin filaments.', 'Mushrooms, too, professorship anyone. Even without leaving the city blocks.\r\n\r\nTheir whitish hats appear after warm rains. And not only in the grass lawns, but in the middle of paved areas.\r\n\r\nFragile - looking and soft to the touch mushroom, breaks through the hard crust of the road surface with a hat. Basically, mushrooms grow in the forest.\r\n\r\nWhat a person calls a mushroom, cuts and puts in a basket, not a mushroom, and the fruit body of the fungus. Like a lump on a pine or a tree, like an Apple on an Apple. The fungus is underground and consists of many thin filaments.\r\n\r\nScientists-mycologists, those that study the mushrooms, these threads are called hyphae or mycelium.\r\n\r\nThreads of mycelium, sprouting in the soil in different directions, form a mycelium.\r\n\r\nScientists have long argued: mushrooms – are they plants or animals?\r\n\r\nSome said: mushrooms – plants. After all, they grow without moving.\r\n\r\nOthers argued: mushrooms – animals. Like earthworms. Just food particles are not swallowed, and in the dissolved form is absorbed by its entire surface. Like bacteria.\r\n\r\nIn the end, agreed – mushrooms are mushrooms. A special intermediate Kingdom is the state.\r\n\r\nThe fungus, or rather the fruit body of the mycelium, does not live long. A week at the most. Compared to him, the mycelium itself is almost eternal. Its age can reach several hundred years.\r\n\r\nSprouting through the litter, mycelium hyphae feed on litter. Transform a waste of the life of forests in humus or humus.\r\n\r\nHumus is rich in nutrients for plants.x worms, the soil becomes more fertile.f.rnichki blueberries and blueberries, it will be called pine blueberries.', 'flowers', '123347.jpg', 'admin', '2019-05-25', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'noavatar.jpg',
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `avatar`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(32, 'alex@gmail.com', '$2y$10$GoAQw.GeDXqLreLlTxMDOuym68q.4c5ouK1GYQkBTCn73u9zImgmy', 'Alexandr', '568982.jpg', 0, 1, 1, 0, 1558268992, 1558269000, 0),
(31, 'admin@mail.ru', '$2y$10$SZd5TbHeSPkCuJN.WHHAIu4svgC4y57iITiYe8xRTkzWMDX/XC49e', 'admin', '763018.jpg', 0, 1, 1, 2097151, 1558250892, 1558777156, 0),
(33, 'dima@mail.ru', '$2y$10$5NdQyOYHXoYkBD8ghPDbqOt3F1SonAQJHfZpWUDe.kwEHOcfaI0S2', 'Dima', '32949.jpg', 0, 1, 1, 32, 1558504093, 1558527873, 0),
(34, 'dogdlivo@gmail.com', '$2y$10$pS8vGHc3SKp8c9VmVWI2pen3jiO0Ma3l7lQksZXPPD8DQAy/gh5sm', 'Alex', '886215.jpg', 0, 1, 1, 32, 1558593210, 1558606290, 0),
(44, 'Jon@mail.ru', '$2y$10$6bnU2oV20ZtS.ZcKNoknUOaiSMP14TOKrXN0EOZq3kEPk4VbCl.ym', 'Jon', '631382.jpg', 0, 1, 1, 32, 1558767109, 1558775566, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_confirmations`
--

INSERT INTO `users_confirmations` (`id`, `user_id`, `email`, `selector`, `token`, `expires`) VALUES
(38, 38, 'Jon@mail.ru', '4ENFFB5vBVQiVEBM', '$2y$10$tH8N8ZepG9k9ihkzZh3FDepayMDdPU77xVCQ6OyuXJtL50O9iH9Va', 1558852558),
(39, 39, 'Jon@mail.ru', 'Sqm5TevZexW32xhY', '$2y$10$ilkuhK3kL1ckxRXpxjpiI.0giL7nnUxx36H3pn.v1NPSwO/ZIT9fW', 1558852735),
(40, 40, 'Jon@mail.ru', 'njCpVKqtcbqUWTbB', '$2y$10$vbiHaQKBMrAKEy6xnCOlA.O9Z.orwmHuF8kh481lBXK/6U5KoMgXi', 1558852848),
(42, 42, 'Jon@mail.ru', 'HmbHAu3QuRAkAD4X', '$2y$10$Drm4CgeGYno9JZJm0lrhfuvxqvF5e5FQ4R72BneH3tG3egnSCzFJm', 1558853252);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('JhlM8IL3uHJSAwLL7yeezZ0Q2u9Lkza-Y_-z96JznmY', 499, 1558773158, 1558945958),
('OMhkmdh1HUEdNPRi-Pe4279tbL5SQ-WMYf551VVvH8U', 19, 1558773158, 1558809158),
('QduM75nGblH2CDKFyk0QeukPOwuEVDAUFE54ITnHM38', 72.1106, 1558777156, 1559317156);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Индексы таблицы `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Индексы таблицы `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
