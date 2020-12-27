<?php

namespace App\Service;

class Random implements RandomInterface
{

    public function rand($min = null, $max = null): int
    {
        return rand($min, $max);
    }

    public function name($excludedNames = []): string
    {
        return $this->str($this->names, $excludedNames);
    }

    public function word($excludedWords = []): string
    {
        return $this->str($this->words, $excludedWords);
    }

    private function str($list, $excluded = [])
    {
        $str = '';
        while($str === '' || in_array($str, $excluded)){
            $str = $list[$this->rand(0, \count($list) - 1)];
        }
        return $str;
    }

    private $words = [
        'angle',
        'armoire',
        'banc',
        'bureau',
        'cabinet',
        'carreau',
        'chaise',
        'classe',
        'clé',
        'coin',
        'couloir',
        'dossier',
        'eau',
        'école',
        'écriture',
        'entrée',
        'escalier',
        'étagère',
        'étude',
        'extérieur',
        'fenêtre',
        'intérieur',
        'lavabo',
        'lecture',
        'lit',
        'marche',
        'matelas',
        'maternelle',
        'meuble',
        'mousse',
        'mur',
        'peluche',
        'placard',
        'plafond',
        'porte',
        'portemanteau',
        'poubelle',
        'radiateur',
        'rampe',
        'récréation',
        'rentrée',
        'rideau',
        'robinet',
        'salle',
        'savon',
        'serrure',
        'serviette',
        'siège',
        'sieste',
        'silence',
        'sol',
        'sommeil',
        'sonnette',
        'sortie',
        'table',
        'tableau',
        'tabouret',
        'tapis',
        'tiroir',
        'toilette',
        'vitre',
        'w.-c.',
        'aller',
        'amener',
        'apporter',
        'appuyer',
        's’asseoir',
        'attendre',
        'bâiller',
        'bosser',
        'se coucher',
        'dormir',
        'éclairer',
        'écrire',
        'emmener',
        'emporter',
        's’endormir',
        's’ennuyer',
        'entrer',
        'étudier',
        'fermer',
        'frapper',
        's’installer',
        'se lever',
        'lire',
        'ouvrir',
        'se presser',
        'se réchauffer',
        'rentrer',
        'se reposer',
        'rester',
        'se réveiller',
        'sonner',
        'sortir',
        'tricher',
        'venir',
        ' crayon',
        'stylo',
        'feutre',
        'taille-crayon',
        'pointe',
        'mine',
        'gomme',
        'dessin',
        'coloriage',
        'rayure',
        'peinture',
        'pinceau',
        'couleur',
        'craie',
        'papier',
        'feuille',
        'cahier',
        'carnet',
        'carton',
        'ciseaux',
        'découpage',
        'pliage',
        'pli',
        'colle',
        'affaire',
        'boîte',
        'casier',
        'caisse',
        'trousse',
        'cartable',
        'jouet',
        'jeu',
        'pion',
        'dé',
        'domino',
        'puzzle',
        'cube',
        'perle',
        'chose',
        'forme : carré',
        'rond',
        'pâte à modeler',
        'tampon',
        'livre',
        'histoire',
        'bibliothèque',
        'image',
        'album',
        'titre',
        'bande dessinée',
        'conte',
        'dictionnaire',
        'magazine',
        'catalogue',
        'page',
        'ligne',
        'mot',
        'enveloppe',
        'étiquette',
        'affiche',
        'alphabet',
        'appareil',
        'caméscope',
        'cassette',
        'cédé',
        'cédérom',
        'chaîne',
        'chanson',
        'chiffre',
        'contraire',
        'différence',
        'doigt',
        'écran',
        'écriture',
        'film',
        'fois',
        'idée',
        'instrument',
        'intrus',
        'lettre',
        'liste',
        'magnétoscope',
        'main',
        'micro',
        'modèle',
        'musique',
        'nom',
        'nombre',
        'orchestre',
        'ordinateur',
        'photo',
        'point',
        'poster',
        'pouce',
        'prénom',
        'question',
        'radio',
        'sens',
        'tambour',
        'télécommande',
        'téléphone',
        'télévision',
        'trait',
        'trompette',
        'voix',
        'xylophone',
        'zéro',
        'ami',
        'attention',
        'camarade',
        'colère',
        'copain',
        'coquin',
        'dame',
        'directeur',
        'directrice',
        'droit',
        'effort',
        'élève',
        'enfant',
        'fatigue',
        'faute',
        'fille',
        'garçon',
        'gardien',
        'madame',
        'maître',
        'maîtresse',
        'mensonge',
        'ordre',
        'personne',
        'retard',
        'sourire',
        'travail',
        'à l’endroit',
        'à l’envers',
        'anorak',
        'arc',
        'bagage',
        'baguette',
        'barbe',
        'bonnet',
        'botte',
        'bouton',
        'bretelle',
        'cagoule',
        'casque',
        'casquette',
        'ceinture',
        'chapeau',
        'chaussette',
        'chausson',
        'chaussure',
        'chemise',
        'cigarette',
        'col',
        'collant',
        'couronne',
        'cravate',
        'culotte',
        'écharpe',
        'épée',
        'fée',
        'flèche',
        'fusil',
        'gant',
        'habit',
        'jean',
        'jupe',
        'lacet',
        'laine',
        'linge',
        'lunettes',
        'magicien',
        'magie',
        'maillot',
        'manche',
        'manteau',
        'mouchoir',
        'moufle',
        'nœud',
        'paire',
        'pantalon',
        'pied',
        'poche',
        'prince',
        'pull-over',
        'pyjama',
        'reine',
        'robe',
        'roi',
        'ruban',
        'semelle',
        'soldat',
        'sorcière',
        'tache',
        'taille',
        'talon',
        'tissu',
        'tricot',
        'uniforme',
        'valise',
        'veste',
        'vêtement',
        'acrobate',
        'arrêt',
        'arrière',
        'barre',
        'barreau',
        'bord',
        'bras',
        'cerceau',
        'chaises',
        'cheville',
        'chute',
        'cœur',
        'corde',
        'corps',
        'côté',
        'cou',
        'coude',
        'cuisse',
        'danger',
        'doigts',
        'dos',
        'échasses',
        'échelle',
        'épaule',
        'équipe',
        'escabeau',
        'fesse',
        'filet',
        'fond',
        'genou',
        'gymnastique',
        'hanche',
        'jambes',
        'jeu',
        'mains',
        'milieu',
        'montagne',
        'mur d’escalade',
        'muscle',
        'numéro',
        'ongle',
        'parcours',
        'pas',
        'passerelle',
        'pente',
        'peur',
        'pieds',
        'plongeoir',
        'poignet',
        'poing',
        'pont de singe',
        'poutre d’équilibre',
        'prises',
        'rivière des crocodiles',
        'roulade',
        'saut',
        'serpent',
        'sport',
        'suivant',
        'tête',
        'toboggan',
        'tour',
        'trampoline',
        'tunnel',
        'ventre',
        'allumette',
        'anniversaire',
        'appétit',
        'beurre',
        'coquille',
        'crêpes',
        'croûte',
        'dessert',
        'envie',
        'faim',
        'fève',
        'four',
        'galette',
        'gâteau',
        'goût',
        'invitation',
        'langue',
        'lèvres',
        'liquide',
        'louche',
        'mie',
        'moitié',
        'moule',
        'odeur',
        'œuf',
        'part',
        'pâte',
        'pâtisserie',
        'recette',
        'rouleau',
        'sel',
        'soif',
        'tarte',
        'tranche',
        'yaourt'
        ];

    private $names = [
        'Matthieu',
        'Marc',
        'Luc',
        'Jean',
        'James',
        'Mary',
        'John',
        'Patricia',
        'Robert',
        'Jennifer',
        'Michael',
        'Linda',
        'William',
        'Elizabeth',
        'David',
        'Barbara',
        'Richard',
        'Susan',
        'Joseph',
        'Jessica',
        'Thomas',
        'Sarah',
        'Charles',
        'Karen',
        'Christopher',
        'Nancy',
        'Daniel',
        'Lisa',
        'Matthew',
        'Margaret',
        'Anthony',
        'Betty',
        'Donald',
        'Sandra',
        'Mark',
        'Ashley',
        'Paul',
        'Dorothy',
        'Steven',
        'Kimberly',
        'Andrew',
        'Emily',
        'Kenneth',
        'Donna',
        'Joshua',
        'Michelle',
        'Kevin',
        'Carol',
        'Brian',
        'Amanda',
        'George',
        'Melissa',
        'Edward',
        'Deborah',
        'Ronald',
        'Stephanie',
        'Timothy',
        'Rebecca',
        'Jason',
        'Laura',
        'Jeffrey',
        'Sharon',
        'Ryan',
        'Cynthia',
        'Jacob',
        'Kathleen',
        'Gary',
        'Amy',
        'Nicholas',
        'Shirley',
        'Eric',
        'Angela',
        'Jonathan',
        'Helen',
        'Stephen',
        'Anna',
        'Larry',
        'Brenda',
        'Justin',
        'Pamela',
        'Scott',
        'Nicole',
        'Brandon',
        'Samantha',
        'Benjamin',
        'Katherine',
        'Samuel',
        'Emma',
        'Frank',
        'Ruth',
        'Gregory',
        'Christine',
        'Raymond',
        'Catherine',
        'Alexander',
        'Debra',
        'Patrick',
        'Rachel',
        'Jack',
        'Carolyn',
        'Dennis',
        'Janet',
        'Jerry',
        'Virginia',
        'Tyler',
        'Maria',
        'Aaron',
        'Heather',
        'Jose',
        'Diane',
        'Henry',
        'Julie',
        'Adam',
        'Joyce',
        'Douglas',
        'Victoria',
        'Nathan',
        'Kelly',
        'Peter',
        'Christina',
        'Zachary',
        'Lauren',
        'Kyle',
        'Joan',
        'Walter',
        'Evelyn',
        'Harold',
        'Olivia',
        'Jeremy',
        'Judith',
        'Ethan',
        'Megan',
        'Carl',
        'Cheryl',
        'Keith',
        'Martha',
        'Roger',
        'Andrea',
        'Gerald',
        'Frances',
        'Christian',
        'Hannah',
        'Terry',
        'Jacqueline',
        'Sean',
        'Ann',
        'Arthur',
        'Gloria',
        'Austin',
        'Jean',
        'Noah',
        'Kathryn',
        'Lawrence',
        'Alice',
        'Jesse',
        'Teresa',
        'Joe',
        'Sara',
        'Bryan',
        'Janice',
        'Billy',
        'Doris',
        'Jordan',
        'Madison',
        'Albert',
        'Julia',
        'Dylan',
        'Grace',
        'Bruce',
        'Judy',
        'Willie',
        'Abigail',
        'Gabriel',
        'Marie',
        'Alan',
        'Denise',
        'Juan',
        'Beverly',
        'Logan',
        'Amber',
        'Wayne',
        'Theresa',
        'Ralph',
        'Marilyn',
        'Roy',
        'Danielle',
        'Eugene',
        'Diana',
        'Randy',
        'Brittany',
        'Vincent',
        'Natalie',
        'Russell',
        'Sophia',
        'Louis',
        'Rose',
        'Philip',
        'Isabella',
        'Bobby',
        'Alexis',
        'Johnny',
        'Kayla',
        'Bradley',
        'Charlotte'];
}