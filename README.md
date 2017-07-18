# cnu-php-workshop-blog

###Zadaní pro CNU
 
Cílem zadaného úkolu je vytvořit "CRUD" aplikaci, která bude obsluhovat jednoduchý blog.
 
Aplikace bude rozdělena na dvě části:
 
##Frontend
 
- veřejná část blogu. Homepage bude sloužit k zobrazení posledních 10 publikovaných článků &lt;hint&gt;MySQL LIMIT&lt;/hint&gt; seřazených sestupně, tedy od nejnovějšího po nejstarší. Bude rovněž obsahovat odkaz na zobrazení všech článků v databázi, řažených stejně. Pro toho kdo se na to cítí, je zde vhodná možnost pokusit se implementovat jednoduchý filtr, který za pomocí parametrů odeslaných na server modifikuje SQL dotaz tak, aby například omezil články datumem, změnil směr řazení, apod., fantazii se meze nekladou.
- Výpis článků by měl obsahovat titulek, malou část obsahu, datum vložení, volitelně obrázek, a odkaz na detail článku.
- Pro zobrazení výpisu můžete použít libovolnou HTML konstrukci, od seznamu &lt;ul&gt;&lt;li&gt;... přes nastylované &lt;div&gt; až po tabulky, nezalezi na tom.
- Každý článek bude možno rozkliknout na detail článku.
- &lt;optional&gt;Přidejte logiku pro nahrání obrázku k článku &lt;hint&gt;http://php.net/manual/en/reserved.variables.files.php&lt;/hint&gt;&lt;hint&gt;http://php.net/manual/en/function.move-uploaded-file.php&lt;/hint&gt;&lt;hint&gt;Je potřeba upravit formulář, tedy přidat speciální input typu “file", a elementu form přidat atribut enctype="multipart/form-data"&lt;/hint&gt;&lt;/optional&gt;
- &lt;optional&gt;Kdo bude opět chtít, může při uložení článku k němu uložit i ID uživatele, který ho vytvořil. Jeho jméno pak může zobrazit v detailu článku jako autora.&lt;hint&gt;Podívejte se jak v MySQL funguje tzv. JOIN, neboli spojování tabulek.&lt;/hint&gt;&lt;/optional&gt;
 
##Backend
 
- veřejně nepřístupná část blogu - administrace - bude přístupná pouze uživatelům z databázové tabulky “users”. Validace přihlášeného uživatele bude probíhat na základě emailu a hesla, které bude uloženo v zahashované podobě. K implementaci této části úkolu je nutná znalost takzvaných “sessions”, lze opět bez problému dohledat tuny materiálu, kde se problematika sessions popisuje. &lt;hint&gt;Důležitá pro vás bude funkce session_start http://php.net/manual/en/function.session-start.php a superglobální pole $_SESSION http://php.net/manual/en/reserved.variables.session.php.&lt;/hint&gt;&lt;hint&gt;Jelikož hesla musí být uložena zahashovaná, při přihlášení uživatele musíte vybrat hash hesla uživatele a porovnat ho se zashashovaným heslem v login formuláře&lt;/hint&gt; Ale vzhledem k tomu, že práce se sessions nemusí být pro začínající programátory úplně lehka a zároveň jsme si je nestihli vysvětlit na našem workshopu, bude k tomuto přihlédnuto, pokud se přihlašování nepodaří plně implementovat, minimálně ale chceme vidět, že jste to zkusili.
- uživatel administrace by měl mít možnost se odhlásit.
- administrace bude dále obsahovat správu článku pro blog, tedy výpis článků, vytváření, editace a mazání. Do výpisu lze opět volitelně přidat například filtry, řazení, apod.
- zároveň by pro přihlášené uživatele měla existovat možnost provádět stejné oprace s uživateli, to jest funkcionalita, která je již pripravena v kostře programu, kterou jsme si ukázali na workshopu.
- &lt;optional&gt;opět, kdo by měl hotovo, může přidat funkce například pro zaslání ztraceného hesla&lt;/optional&gt;
 
Vše piště prosím v angličtině, pokuste se dbát na přehlednost a čitelnost kódu. Výsledek vaší práce zašlete v ZIP souboru, případně kdo má - může uložit na github, gitlab, atd. Součástí odevzdaného projektu musí být i SQL export databáze!! (lze použít phpmyadmin, adminer, případně https://dev.mysql.com/doc/refman/5.7/en/mysqldump.html
 
ZDE https://github.com/dan-urban/cnu-php-workshop-blog je odkaz na github, odsud si můžete stáhnout kostru aplikace.
 
Případné dotazy prosím do Slacku.
 
Rada na závěr, pracujte se zdroji, je jich hodně, škoda se z nich něco nepřiučit ;-)
 
Hodně štěstí :-)
 
Dan