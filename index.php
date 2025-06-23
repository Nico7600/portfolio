<?php
$allowedLangs = ['fr','en','es','de','it','pt','ru','zh','ja','ko','ar','nl','tr','pl','sv','uk','el','hi'];
$lang = $_GET['lang'] ?? 'fr';
if (!in_array($lang, $allowedLangs, true)) {
    $lang = 'fr';
}
$langFile = __DIR__ . "/lang/lang.$lang.php";
if (!file_exists($langFile)) {
    $langFile = __DIR__ . "/lang/lang.fr.php";
}
$t = include $langFile;
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $t['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(80px) scale(0.95) rotateX(10deg);
            filter: blur(12px) brightness(1.2);
            animation: fadeInUp 2.2s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }
        @keyframes fadeInUp {
            60% {
                opacity: 1;
                filter: blur(2px) brightness(1.05);
                transform: translateY(-8px) scale(1.01) rotateX(0deg);
            }
            80% {
                filter: blur(0.5px) brightness(1);
                transform: translateY(2px) scale(1) rotateX(0deg);
            }
            100% {
                opacity: 1;
                filter: blur(0) brightness(1);
                transform: none;
            }
        }
        .typewriter {
            display: inline-block;
            border-right: 2px solid #e53935;
            white-space: nowrap;
            overflow: hidden;
            animation: blink-caret 0.8s step-end infinite;
        }
        @keyframes blink-caret {
            0%,100% { border-color: #e53935; }
            50% { border-color: transparent; }
        }
    </style>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Public Sans', 'Montserrat', 'Roboto', 'sans-serif'],
                    },
                    colors: {
                        primary: '#212936',
                        secondary: '#0d1117',    
                        accent: '#3060A8',       
                        accent2: '#60A8D4',      
                        'gray-border': '#212936', 
                        'gray-text': '#FFFFFF',  
                        'container-bg': '#212936', 
                        'container-grad1': '#212936',
                        'container-grad2': '#3060A8',
                        'container-grad3': '#60A8D4',
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-gradient-to-br from-secondary via-primary to-accent2 min-h-screen text-gray-text font-sans">
    <!-- Header -->
    <header class="bg-gradient-to-r from-primary to-secondary border-b border-accent shadow-xl sticky top-0 z-50 fade-in" style="animation-delay:0.1s">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center py-6 px-2 md:px-4 gap-4 w-full">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-tight flex items-center gap-2 md:gap-3 drop-shadow-lg w-full md:w-auto">
            <i class="fas fa-code text-accent animate-pulse"></i>
            <span id="mainTypewriter" class="typewriter" data-text="<?= htmlspecialchars($t['title']) ?>"></span>
        </h1>
        <!-- Dropdown for language selection -->
        <div class="relative w-full md:w-auto">
            <button id="langDropdownBtn" class="flex items-center gap-2 px-4 py-2 bg-accent text-gray-text rounded focus:outline-none w-full md:w-auto justify-center transition-transform duration-300 hover:scale-105 hover:rotate-1 animate-langpulse">
                <i class="fas fa-globe"></i>
                <?= strtoupper($lang) ?>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
            <div id="langDropdown" class="absolute right-0 mt-2 w-44 sm:w-56 max-h-96 overflow-y-auto bg-container-bg border border-accent rounded shadow-lg hidden z-50">
                    <a href="?lang=fr" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'fr' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-fr"></span> Français
                    </a>
                    <a href="?lang=en" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'en' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-gb"></span> English
                    </a>
                    <a href="?lang=es" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'es' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-es"></span> Español
                    </a>
                    <a href="?lang=de" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'de' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-de"></span> Deutsch
                    </a>
                    <a href="?lang=it" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'it' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-it"></span> Italiano
                    </a>
                    <a href="?lang=pt" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'pt' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-pt"></span> Português
                    </a>
                    <a href="?lang=ru" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'ru' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-ru"></span> Русский
                    </a>
                    <a href="?lang=zh" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'zh' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-cn"></span> 中文
                    </a>
                    <a href="?lang=ja" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'ja' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-jp"></span> 日本語
                    </a>
                    <a href="?lang=ko" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'ko' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-kr"></span> 한국어
                    </a>
                    <a href="?lang=ar" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'ar' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-sa"></span> العربية
                    </a>
                    <a href="?lang=nl" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'nl' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-nl"></span> Nederlands
                    </a>
                    <a href="?lang=tr" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'tr' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-tr"></span> Türkçe
                    </a>
                    <a href="?lang=pl" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'pl' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-pl"></span> Polski
                    </a>
                    <a href="?lang=sv" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'sv' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-se"></span> Svenska
                    </a>
                    <a href="?lang=uk" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'uk' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-ua"></span> Українська
                    </a>
                    <a href="?lang=el" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'el' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-gr"></span> Ελληνικά
                    </a>
                    <a href="?lang=hi" class="flex items-center gap-2 px-4 py-2 hover:bg-accent/30 <?= $lang === 'hi' ? 'font-bold text-accent' : '' ?>">
                        <span class="fi fi-in"></span> हिन्दी
                    </a>
                </div>
            </div>
        </div>
        <style>
        @keyframes langpulse {
            0%, 100% { box-shadow: 0 0 0 0 #3060A880; }
            50% { box-shadow: 0 0 0 6px #3060A833; }
        }
        .animate-langpulse { animation: langpulse 2.2s infinite; }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css"/>
    </div>
</header>
    <div class="h-6 sm:h-10"></div>
    <!-- Bio Section -->
    <?php
        $chemin_image = "img/moi.JPG";
    ?>
    <section class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-6 md:gap-10 py-8 md:py-16 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg transition-colors duration-300 fade-in" style="animation-delay:0.2s">
        <div class="flex-shrink-0 relative group flex flex-col items-center w-full md:w-auto">
            <img src="<?php echo $chemin_image; ?>" alt="Nicolas"
                class="w-32 h-32 sm:w-40 sm:h-40 md:w-48 md:h-48 rounded-full border-4 border-accent shadow-2xl object-cover object-center transition-transform duration-300 group-hover:scale-105 bg-transparent" />
            <span class="mt-4 inline-block bg-accent/20 text-accent px-4 py-2 rounded-full text-xs sm:text-sm font-semibold text-center w-full max-w-xs">
                <?= ($t['status_alternance'] ?? "Statut : En attente d'une réponse d'alternance") . ' (Alegorix)' ?>
            </span>
        </div>
        <div class="flex-1 w-full">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-3 flex items-center gap-2 md:gap-3">
                <i class="fas fa-user-circle text-accent"></i>
                Nicolas Deprets
            </h2>
            <div class="flex flex-wrap items-center gap-2 md:gap-3 mb-2">
                <span class="inline-block bg-accent/20 text-accent px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider"><?= $t['age_20'] ?? '20 ans' ?></span>
                <span class="inline-block bg-accent/20 text-accent px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider"><?= $t['city_peruwelz'] ?? 'Péruwelz (Hainaut)' ?></span>
                <span class="inline-block bg-green-600/20 text-green-400 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider"><?= $t['header'] ?></span>
            </div>
            <p class="text-gray-text mb-6 text-base sm:text-lg leading-relaxed border-l-4 border-accent pl-2 sm:pl-4 italic"><?= $t['about_text'] ?></p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-6 mt-2">
                <a href="https://github.com/nico7600" target="_blank" class="hover:text-accent text-2xl flex items-center gap-2 transition">
                    <i class="fab fa-github" style="color:#181717;"></i>
                    <span class="text-base font-medium"><?= $t['github'] ?></span>
                </a>
                <a href="https://www.linkedin.com/in/nicolas-deprets-62a6b4335/" target="_blank" class="text-[#0077b5] hover:text-accent text-2xl flex items-center gap-2 transition">
                    <i class="fab fa-linkedin"></i> <span class="text-base font-medium"><?= $t['linkedin'] ?></span>
                </a>
                <a href="mailto:depretsnico@gmail.com" class="text-[#ea4335] hover:text-accent text-2xl flex items-center gap-2 transition">
                    <i class="fas fa-envelope"></i> <span class="text-base font-medium"><?= $t['mail'] ?></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.25s"></div>
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.3s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-graduation-cap text-accent"></i>
            <?= $t['school_path'] ?>
        </h2>
        <div class="relative pl-6 md:pl-12">
        <div class="absolute left-2 md:left-4 top-0 bottom-0 w-1 bg-accent/40 rounded-full"></div>
        <ul class="space-y-8">
            <li class="relative flex items-start group">
                <span class="absolute -left-6 md:-left-10 top-2 w-5 h-5 bg-accent rounded-full border-4 border-container-bg shadow-lg"></span>
                <div class="ml-2 md:ml-6">
                    <span class="inline-block bg-accent/20 text-accent px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-1">2022-2023</span>
                    <div class="text-base sm:text-lg"> <?= $t['school_2022'] ?> </div>
                </div>
            </li>
            <li class="relative flex items-start group">
                <span class="absolute -left-6 md:-left-10 top-2 w-5 h-5 bg-accent rounded-full border-4 border-container-bg shadow-lg"></span>
                <div class="ml-2 md:ml-6">
                    <span class="inline-block bg-accent/20 text-accent px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-1">2023-2024</span>
                    <div class="text-base sm:text-lg"> <?= $t['school_2023'] ?> </div>
                </div>
            </li>
            <li class="relative flex items-start group">
                <span class="absolute -left-6 md:-left-10 top-2 w-5 h-5 bg-accent rounded-full border-4 border-container-bg shadow-lg"></span>
                <div class="ml-2 md:ml-6">
                    <span class="inline-block bg-accent/20 text-accent px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-1">2024-2025</span>
                    <div class="text-base sm:text-lg"> <?= $t['school_2024'] ?> </div>
                </div>
            </li>
            <li class="relative flex items-start group opacity-60">
                <span class="absolute -left-6 md:-left-10 top-2 w-5 h-5 bg-gray-500 rounded-full border-4 border-container-bg shadow-lg"></span>
                <div class="ml-2 md:ml-6">
                    <span class="inline-block bg-gray-500/20 text-gray-400 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-1">2025-2026</span>
                    <div class="text-base sm:text-lg italic text-gray-400"> <?= $t['school_2025'] ?> </div>
                </div>
            </li>
            <li class="relative flex items-start group opacity-40">
                <span class="absolute -left-6 md:-left-10 top-2 w-5 h-5 bg-gray-400 rounded-full border-4 border-container-bg shadow-lg"></span>
                <div class="ml-2 md:ml-6">
                    <span class="inline-block bg-gray-400/20 text-gray-300 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-1">2026-2027</span>
                    <div class="text-base sm:text-lg italic text-gray-300"> <?= $t['school_2026'] ?> </div>
                </div>
            </li>
        </ul>
    </div>
    </section>
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.35s"></div>
    <!-- Langues parlées Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.37s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-language text-accent"></i>
            <?= $t['spoken_languages'] ?>
        </h2>
        <div class="flex flex-wrap gap-6 md:gap-10 justify-center">
            <?php
            $languages = [
                ['key' => 'french', 'percent' => 95, 'color' => '#e53935'],
                ['key' => 'english', 'percent' => 40, 'color' => '#3b82f6'],
                ['key' => 'dutch', 'percent' => 25, 'color' => '#f59e42'],
            ];
            foreach ($languages as $lang) {
                $radius = 40;
                $circumference = 2 * pi() * $radius;
                $progress = $circumference * (1 - $lang['percent'] / 100);
                echo '<div class="flex flex-col items-center bg-[#18191c] rounded-2xl shadow-lg p-6 hover:scale-105 transition-all duration-300 min-w-[140px]">';
                echo '<div class="relative mb-2">';
                echo '<svg width="100" height="100" class="block" style="transform:rotate(-90deg)">
                        <circle cx="50" cy="50" r="'.$radius.'" stroke="#30363d" stroke-width="10" fill="none"/>
                        <circle cx="50" cy="50" r="'.$radius.'" stroke="'.$lang['color'].'" stroke-width="10" fill="none"
                            stroke-dasharray="'.$circumference.'" stroke-dashoffset="'.$progress.'" style="transition:stroke-dashoffset 1s;"/>
                      </svg>';
                // Pourcentage centré
                echo '<div class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-gray-text">'.$lang['percent'].'%</div>';
                echo '</div>';
                echo '<div class="text-lg font-semibold text-gray-text">'.$t[$lang['key']].'</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.4s"></div>
    <!-- Personnalité Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.4s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-user-astronaut text-accent"></i>
            <?= $t['personality'] ?? 'Personnalité' ?>
        </h2>
        <ul class="flex flex-wrap gap-3 md:gap-6 text-base sm:text-lg">
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-users" style="color:#60a5fa"></i> <?= $t['sociable'] ?? 'Sociable' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-sync-alt" style="color:#f59e42"></i> <?= $t['adaptable'] ?? "M'adapte bien" ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-layer-group" style="color:#34d399"></i> <?= $t['versatile'] ?? 'Polyvalent' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-hard-hat" style="color:#fbbf24"></i> <?= $t['hardworking'] ?? 'Travailleur' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="far fa-laugh-beam" style="color:#f472b6"></i> <?= $t['funny'] ?? 'Drôle' ?>
            </li>
        </ul>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.45s"></div>
    <!-- Passion Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.5s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-heart text-accent"></i>
            <?= $t['passions'] ?? 'Passions' ?>
        </h2>
        <ul class="flex flex-wrap gap-3 md:gap-6 text-base sm:text-lg">
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-horse" style="color:#a78bfa"></i> <?= $t['horse_riding'] ?? 'Équitation' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-gamepad" style="color:#38bdf8"></i> <?= $t['video_games'] ?? 'Jeux vidéo' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-tree" style="color:#4ade80"></i> <?= $t['walk_outside'] ?? 'Balade dehors' ?>
            </li>
            <li class="flex items-center gap-3 bg-accent/10 text-white px-5 py-3 rounded-xl font-semibold shadow">
                <i class="fas fa-user-friends" style="color:#f87171"></i> <?= $t['with_friends'] ?? 'Passer du temps avec des amis' ?>
            </li>
        </ul>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.55s"></div>
    <!-- Projects Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 fade-in" style="animation-delay:0.6s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-folder-open text-accent"></i>
            <?= $t['projects'] ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            <div class="bg-container-bg rounded-2xl shadow-xl p-8 flex flex-col gap-4 border border-accent transition group hover:scale-[1.04] hover:shadow-2xl hover:border-accent2 hover:-translate-y-1 hover:bg-accent/10 duration-300 cursor-pointer">
                <div class="flex items-center gap-4">
                    <i class="fas fa-tools text-accent text-3xl group-hover:rotate-12 transition"></i>
                    <span class="text-2xl font-semibold">
                        <?= $t['project_nationstool_title'] ?>
                    </span>
                </div>
                <p class="text-gray-text text-base">
                    <?= $t['project_nationstool_desc'] ?>
                </p>
                <a href="https://rp.nationstools.fr" target="_blank" class="text-accent hover:underline mt-2 flex items-center gap-2 font-semibold">
                    <i class="fas fa-external-link-alt"></i>
                    <?= $t['project_nationstool_link'] ?>
                </a>
            </div>
            <div class="bg-container-bg rounded-2xl shadow-xl p-8 flex flex-col gap-4 border border-accent transition group hover:scale-[1.04] hover:shadow-2xl hover:border-accent2 hover:-translate-y-1 hover:bg-accent/10 duration-300 cursor-pointer">
                <div class="flex items-center gap-4">
                    <i class="fas fa-briefcase text-accent text-3xl group-hover:rotate-12 transition"></i>
                    <span class="text-2xl font-semibold">
                        <?= $t['project_portfolio_title'] ?>
                    </span>
                </div>
                <p class="text-gray-text text-base">
                    <?= $t['project_portfolio_desc'] ?>
                </p>
                <a href="#" class="text-accent hover:underline mt-2 flex items-center gap-2 font-semibold">
                    <i class="fas fa-external-link-alt"></i>
                    <?= $t['project_portfolio_link'] ?>
                </a>
            </div>
            <div class="bg-container-bg rounded-2xl shadow-xl p-8 flex flex-col gap-4 border border-accent transition group hover:scale-[1.04] hover:shadow-2xl hover:border-accent2 hover:-translate-y-1 hover:bg-accent/10 duration-300 cursor-pointer">
                <div class="flex items-center gap-4">
                    <i class="fas fa-ticket-alt text-accent text-3xl group-hover:rotate-12 transition"></i>
                    <span class="text-2xl font-semibold">
                        <?= $t['project_workshop_title'] ?>
                    </span>
                </div>
                <p class="text-gray-text text-base">
                    <?= $t['project_workshop_desc'] ?>
                </p>
                <a href="https://workshopgroupe.nicolasdeprets.online" target="_blank" class="text-accent hover:underline mt-2 flex items-center gap-2 font-semibold">
                    <i class="fas fa-external-link-alt"></i>
                    <?= $t['project_workshop_link'] ?>
                </a>
            </div>
        </div>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.65s"></div>
    <!-- Competences Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.7s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-lightbulb text-accent"></i>
            <?= $t['competences'] ?>
        </h2>
        <div>
            <!-- Onglets -->
            <div class="flex flex-col sm:flex-row gap-2 md:gap-4 mb-4 md:mb-6">
                <button id="tab-langages" class="competence-tab px-4 py-2 rounded-t bg-accent text-gray-text font-bold focus:outline-none flex items-center gap-2 w-full sm:w-auto justify-center">
                    <i class="fas fa-code"></i> <?= $t['tab_langages'] ?>
                </button>
                <button id="tab-hebergeur" class="competence-tab px-4 py-2 rounded-t bg-accent/70 text-gray-text font-bold focus:outline-none flex items-center gap-2 w-full sm:w-auto justify-center">
                    <i class="fas fa-server"></i> <?= $t['tab_hebergeur'] ?>
                </button>
                <button id="tab-autre" class="competence-tab px-4 py-2 rounded-t bg-accent/70 text-gray-text font-bold focus:outline-none flex items-center gap-2 w-full sm:w-auto justify-center">
                    <i class="fas fa-ellipsis-h"></i> <?= $t['tab_autre'] ?>
                </button>
            </div>
            <!-- Contenus des onglets -->
            <div id="content-langages" class="competence-content">
                <div class="flex flex-wrap gap-3 md:gap-6">
                    <div class="flex items-center gap-3 bg-container-bg text-[#8993be] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-php"></i> <?= $t['php'] ?? 'PHP' ?>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#e44d26] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-html5"></i> <?= $t['html'] ?? 'HTML' ?>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#1572b6] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-css3-alt"></i> <?= $t['css'] ?? 'CSS' ?>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#61dafb] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-react"></i> <?= $t['reactjs'] ?? 'React.js' ?>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#f7df1e] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-js-square"></i> <?= $t['javascript'] ?? 'JavaScript' ?> <span class="text-xs font-normal ml-1"></span>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#f34f29] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fab fa-git-alt"></i> <?= $t['git_github'] ?? 'Git / GitHub' ?>
                    </div>
                </div>
            </div>
            <div id="content-hebergeur" class="competence-content hidden">
                <div class="flex flex-wrap gap-3 md:gap-6">
                    <div class="flex items-center gap-3 bg-container-bg text-[#12306b] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fas fa-server"></i> <?= $t['ovh_hosting'] ?? 'Gestion de site en ligne sous OVH' ?>
                    </div>
                    <div class="flex items-center gap-3 bg-container-bg text-[#00bfae] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fas fa-server"></i> <?= $t['minestrator_hosting'] ?? 'Gestion de site en ligne sous MineStrator' ?>
                    </div>
                </div>
            </div>
            <div id="content-autre" class="competence-content hidden">
                <div class="flex flex-wrap gap-3 md:gap-6">
                    <div class="flex items-center gap-3 bg-container-bg text-[#00618a] px-6 py-4 rounded-xl shadow-lg text-xl font-semibold border border-accent">
                        <i class="fas fa-database"></i> <?= $t['mysql_phpmyadmin'] ?? 'Base de données MySQL sous phpMyAdmin' ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Simple onglet JS
            const tabs = [
                {btn: 'tab-langages', content: 'content-langages'},
                {btn: 'tab-hebergeur', content: 'content-hebergeur'},
                {btn: 'tab-autre', content: 'content-autre'}
            ];
            tabs.forEach((tab, idx) => {
                document.getElementById(tab.btn).onclick = function() {
                    tabs.forEach((t, i) => {
                        document.getElementById(t.content).classList.toggle('hidden', i !== idx);
                        document.getElementById(t.btn).classList.toggle('bg-accent', i === idx);
                        document.getElementById(t.btn).classList.toggle('bg-accent/70', i !== idx);
                    });
                };
            });
        </script>
    </section>
    <!-- Separator -->
    <div class="max-w-4xl mx-auto my-4 md:my-8 border-t-2 border-accent/30 fade-in" style="animation-delay:0.75s"></div>
    <!-- Software/Integration Section -->
    <section class="max-w-6xl mx-auto py-6 md:py-10 px-2 md:px-4 bg-container-bg rounded-xl shadow-lg fade-in" style="animation-delay:0.8s">
        <h2 class="text-2xl sm:text-3xl font-bold mb-6 md:mb-8 flex items-center gap-2 md:gap-3">
            <i class="fas fa-plug text-accent"></i>
            <?= $t['software_integration'] ?? 'Software / Integration' ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
            <?php
            $software = [
                [$t['software_github_title'], $t['software_github_desc'], 'fab fa-github', '#181717'],
                [$t['software_tailwind_title'], $t['software_tailwind_desc'], 'fas fa-wind', '#06b6d4'],
                [$t['software_fa_title'], $t['software_fa_desc'], 'fas fa-icons', '#339af0'],
                [$t['software_bootstrap_title'], $t['software_bootstrap_desc'], 'fab fa-bootstrap', '#7952b3'],
            ];
            foreach ($software as $item) {
                echo '<div class="flex items-center gap-6 bg-container-bg rounded-2xl p-7 shadow-xl border border-accent hover:scale-105 transition">';
                echo '<i class="'.$item[2].' text-4xl drop-shadow" style="color:'.$item[3].'"></i>';
                echo '<div>';
                echo '<h3 class="text-xl font-bold text-gray-text mb-1">'.$item[0].'</h3>';
                echo '<p class="text-gray-text">'.$item[1].'</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
    <!-- Footer -->
    <footer class="mt-10 md:mt-16 py-6 md:py-8 text-center text-gray-text text-sm md:text-base border-t-2 border-accent/30 bg-primary/80 backdrop-blur fade-in" style="animation-delay:0.85s">
        <?= $t['footer_copyright'] ?? ('&copy; ' . date('Y') . ' Nicolas Deprets.') ?>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Typewriter animation for the main title
            const typeTarget = document.getElementById('mainTypewriter');
            if(typeTarget){
                const fullText = typeTarget.getAttribute('data-text');
                let i = 0;
                typeTarget.textContent = '';
                function typeWriter() {
                    if (i <= fullText.length) {
                        typeTarget.textContent = fullText.slice(0, i);
                        i++;
                        setTimeout(typeWriter, 90);
                    }
                }
                typeWriter();
            }

            const btn = document.getElementById('langDropdownBtn');
            const menu = document.getElementById('langDropdown');
            if(btn && menu) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                });
                menu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
                document.addEventListener('click', function() {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>
</body>
</html>