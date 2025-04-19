# Frontend-tpls

**Frontend-tpls** - библиотека шаблонов предназначенная для упрощения и ускорения процесса разработки современных адаптивных сайтов. Шаблоны содержат наиболее часто используемые и актуальные компоненты, что помогает создавать стильные и функциональные сайты с минимальными усилиями.

## Быстрый старт
Для быстрого запуска проекта рекомендуется использовать платформу [OpenServer](https://ospanel.io/). Проект распаковывается в папку domains.  
Во избежание конфликтов, перед установкой зависимостей и запуском сборщика рекомендуется установить версию Node.js не ниже 14 (быстрая смена версий Node.js - см. https://github.com/nvm-sh/nvm).

#### Установка зависимостей
> npm i

#### Сборка JS и CSS, запуск вотчера
> npm run watch

#### Сборка JS и CSS
> npm run dev

#### Сборка JS и CSS и их минификация
> npm run prod

По окончании сборки в папке assets появляются файлы app.min.js (собранный js), app.min.css (стили), svg.min.html (svg-спрайт), vendor.css (стили normalize.css и других библиотек из node modules, подключаются в /webpack.mix.js). Все они подключены в теге head на страницах проекта. 
 
## Начало верстки. Шаблоны
Для облегчения модульности и интеграции с CMS все файлы шаблонов выполнены в формате PHP. Типовые шаблоны страниц сайта расположены в папке /pages, шаблоны различных блоков - в папке /templates
Для начала верстки достаточно открыть index.php, подключить header и footer и начать писать код.

#### Структура страницы по умолчанию
    html 
        body[data-home="/"]
            header.header
            .wrapper
                .wrapper__content
                    .container.nx-section
                    .container
                        section.nx-section
                        section.nx-section
                footer.footer
            modals
            script
            Google аналитика
            Яндекс.Метрика

Ненужные блоки и страницы сайта после окончания верстки необходимо удалить.

## Стили
В проекте используются 2 итоговых файла стилей, которые подключены в теге head:
1. /assets/vendor.css - собирается из стилей node modules. Библиотеки со стилями, которые необходимо подключить прописываются в const paths > src > vendorCss в /webpack.mix.js.
2. /assets/app.min.css - собирается из всех .scss файлов.

Для облегчения написания стилей в проекте используется препроцессор sass. Все scss файлы расположены в /assets/scss.

#### Основные файлы стилей
1. **/assets/scss/_variables.scss** - переменные для всего проекта
2. **/assets/scss/_mixins.scss** - миксины для всего проекта
3. **/assets/scss/_starting.scss** - стили структуры страницы html, body, .wrapper, .container
4. **/assets/scss/_layouts.scss** - модификаторы .flex-row, вспомогательные классы
5. **/assets/scss/_vendor/_flex-grid.scss** - стили для flexbox колонок
6. **/assets/scss/main/_header.scss** - стили для header
7. **/assets/scss/main/_footer.scss** - стили для footer
8. **/assets/scss/main/_menu.scss** - стили для основного меню
9. **/assets/scss/main/_links.scss** - стили для ссылок
10. **/assets/scss/main/_titles.scss** - стили заголовков
11. **/assets/scss/main/_content.scss** - стили для содержимого текстовых редакторов из админ. панели
12. **/assets/scss/blocks/_mtoggle.scss** - стили для .mtoggle (бутерброд меню в моб. версиях)
13. **/assets/scss/forms/_btns.scss** - стили для кнопок
14. **/assets/scss/forms/_checkbox.scss** - стили для чекбоксов
15. **/assets/scss/forms/_forms.scss** - стили для форм
16. **/assets/scss/forms/_nx-dynamic-label.scss** - стили динамических инпутов
17. **/assets/scss/sliders/** - стили слайдеров
18. **/assets/scss/themes/** - кастомные стили библиотек likely, bootstrap, nouislider, select2

В папке **/assets/scss/nx-blocks/** также можно найти стили для различных ui-элементов.

Для написания новых стилей необходимо создать в папке /assets/blocks. файл ***имя_класса*.scss** и импортировать его в /assets/scss/import.scss. Для каждого класса создается отдельный файл со стилями.
После окончания верстки рекомендуется удалить неиспользуемые файлы стилей из структуры проекта, а также стереть их импорты из /assets/scss/import.scss

#### Пример - написание стилей для класса .my_class
1. В папке **/assets/blocks/** создаем файл **_my_class.scss**, в котором прописываем css-правила для класса.
2. В файле **/assets/scss/import.scss** прописываем импорт
   > @import "/assets/blocks/my_class.scss";

Стили подключены
## Шрифты
Файлы шрифтов в формате WOFF, WOFF2 и TTF складываются в папку **/assets/fonts/**. CSS-правила для шрифтов задаются в файлах ***название_шрифта*.css** в папке  **/assets/scss/_vendor/fonts/** и импортируются в **/assets/scss/import.scss**
#### Пример - подключение шрифта "CeraPro"
1. Создаем в папке **/assets/fonts/** каталог **CeraPro**
2. Складываем в него все файлы шрифта в форматах WOFF, WOFF2 и TTF: **CeraPro-Light.woff**, **CeraPro-Light.woff2** и т.д.
3. В папке  **/assets/scss/_vendor/fonts/ создаем файл **CeraPro.css**, в котором прописываем css-правила для шрифта c указанием путей:
   >@font-face {<br>
      font-family: 'CeraPro';<br>
      src: url('/assets/fonts/CeraPro/CeraPro-Light.woff') format('woff'),<br>
      url('/assets/fonts/CeraPro/CeraPro-Light.woff2') format('woff2');<br>
      font-style: normal;<br>
      font-weight: 300;<br>
      }

   Можно также использовать миксин font-face(см. **/assets/scss/_mixins.scss**)
4. В файле **/assets/scss/import.scss** прописываем 
    > @import "_vendor/fonts/CeraPro.css";

Новый шрифт подключен.

## Медиа-запросы
Для удобства написания медиа-запросов в проекте используются миксин media (см. **/assets/scss/_mixins.scss**).<br>
Создание медиа-запроса в файлах стилей начинается с объявления миксина media
>@include media()

В качестве аргументов указывается одно или несколько условий - минимальные и максимальные значения расширения экрана, которые заданы в переменной $breakpoints (**/assets/scss/_variables.scss**):

   > $breakpoints: (<br>
   xs: 767px,<br>
   sm-min: 768px,<br>
   sm-max: 991px,<br>
   md-min: 992px,<br>
   md-max: 1199px,<br>
   lg-min: 1200px,<br>
   lg-max: 1399px,<br>
   xl-min: 1400px,<br>
   xl-max: 1599px<br>
);

В данную переменную можно прописывать свои значения.<br>

#### Примеры медиа-запросов
Для задания максимальной ширины viewport используется один аргумент со значением max (или 'xs')
>*Медиа-запрос для ширины viewport меньше 768px:*<br>
>@include media('xs') {<br>
>     *Ваш код*<br>
> }

>*Медиа-запрос для ширины viewport меньше 991px:*<br>
>@include media('sm-max') {<br>
>     *Ваш код*<br>
> }

Для задания минимальной ширины viewport используется один аргумент со значением min
>*Медиа-запрос для ширины больше 768px:*<br>
>@include media('sm-min') {<br>
>     *Ваш код*<br>
> }

Для задания диапазона ширины viewport используется два аргумента со значениями min и max 
>*Медиа-запрос для ширины больше viewport от 768px до 991px:*<br>
>@include media('sm-min', 'sm-max') {<br>
>     *Ваш код*<br>
> }

## SVG 
Все иконки svg складываются в папку **/assets/images/icons/**. Затем они преобразуются в svg-спрайт. Параметры преобразования можно найти в переменной svgOpt в **/webpack.mix.js**/
Для использования иконок в атрибуте [xlink:href] тега use указывается параметр **#icon-*имя_иконки***.
#### Пример - добавление и использование иконки plus.svg
1. Добавляем файл иконки plus.svg в папку **/assets/images/icons/**
2. При использовании иконки в верстке прописываем код:
   
```
<svg>
   <use xlink:href="#icon-plus"></use>
</svg>
```
*При изменении структуры проекта, во избежание ошибок, нужно указать правильный путь к svg-спрайту в методе loadSvgSprite() класса Nx(**/assets/js/next/Nx.js**).

## JavaScript
Весь код JavaScript находится в папке **/assets/js/**. 
Финальный файл js-кода  **/assets/app.min.js** собирается и минифицируется из **/assets/js/app.js**. 
Написание js-кода в проекте принято в ООП-стиле. В папках **/assets/js/next**, **/assets/js/modules** и **/assets/js/plugins** находятся скрипты. Каждый скрипт содержит класс, решающий одну конкретную проблему. Все они импортируются и инициализируются в скрипте **/assets/js/app.js**. Передача информации из html в js-скрипты осуществляется посредством data-атрибутов. Далее дается краткое описание всех папок в директории **/assets/js/**, а также файла **app.js**

### Папка next
В папке содержатся основные скрипты проекта:

#### Nx.js - класс с хелперами.
Тут собраны универсальные методы для работы других скриптов. Можно также дописывать свои методы. Класс инициализируется в app.js и присваивается в переменную $.nx. Таким образом, чтобы вызвать какой-либо метод класса Nx из любого скрипта проекта, нужно использовать конструкцию $.nx.*название_метода*
#### Пример - вызов метода для загрузки прелоадера 
>$.nx.insertPreloader(obj, replace, theme)
#### Основные хелперы Nx.js:
**removeSpaces** - удаляет пробелы в строке<br>
**addSpaces** - добавляет пробелы в строке чисел<br>
**saveLocation** - запоминает позицию элемента в dom<br>
**restoreLocation** - восстанавливает позицию элемента в dom<br>
**isElementInViewport** - проверяет видимость (нахождение) элемента в область видимости<br>
**isTouch** - проверка присутствует ли на устройстве touch<br>
**isEmpty** - проверка объекта на пустоту<br>
**getCookie** - возвращает cookie с именем name, если есть, если нет, то undefined<br>
**setCookie** - запись в cookie<br>
**deleteCookie** - удаляет cookie<br>
**decline** - склоняет слово в зависимости от числа<br>
**writeDecline** - записывает текущее склонение слова при изменении числа<br>
**insertPreloader** - вставляет прелоадер в контент c различными css модификаторами<br>
**hidePreloader** - скрывает preloader<br>
**getChar** - получает номер клавиши<br>
**scrollbarWidth** - вычисляет толщину scrollbar<br>
**smoothScroll** - скрол к элементу<br>
**scrollTop** - скролл вверх<br>
**wrapTableIntoDiv** - оборачивает table в div в классе .text<br>
**serializefiles** - сериализация формы с файлами<br>

Другие классы директории:<br>

#### NxMenu - класс, описывающий бургер-меню и сабменю.<br>

#### NxDynamicFormLabel - динамический плейсхолдер на инпутах.<br>
label должен иметь data-атрибут [data-dynamic-label] и содержать внутри input с data-атрибутом [data-dynamic-inp]
Для активного класса используется класс .focused на родителе<br>
```
label.nx-dynamic-label[data-dynamic-label]
   input.nx-dynamic-label__input[data-dynamic-inp]
   span.nx-dynamic-label__text
```
#### NxPhoneMask.js - маска телефона. Используется библиотека [Imask](https://imask.js.org/)<br>
Для ввода по маске телефона используется data-атрибут [data-phone-mask]
```
<input type="text" data-phone-mask placeholder=" ">
```
#### NxTabs - табы с ajax-подгрузкой.<br>
Для переключения класса *.active* на элементе таба, необходимо использовать атрибут на ссылке *.nx-tabs__link[data-toggle-active]*. В значение атрибута можно передавать различные значения, например, для подгрузки контента через ajax.
```
.nx-tabs[data-list-slider="tabs"]
   .swiper-wrapper.nx-tabs__wrap
       .swiper-slide.nx-tabs__item
           a.nx-tabs__link[data-toggle-active]
               span
       .swiper-slide.nx-tabs__item
           a.nx-tabs__link[data-toggle-active]
               span
```

Для скрола табов используется Swiper slider. Для инициализации необходимо использовать атрибут .nx-tabs[data-nx-tabs-slider]  

#### NxRequest - Отправка и валидация формы.

Формы должны отправляться url, указанный атрибут тега form[action="/request-url/"]

Для отправки формы по нажатию enter, форма должна содержать button[type="submit"]

В форме обязательно нужно указывать информацию о согласии с политикой конфиденциальности, даже если дизайнер не нарисовал.

Для отправки и запуска валидирования формы после ответа от сервера используется специальный атрибут button[data-send-request="request-name"]. Вместо "request-name" указывается тип отправляемой формы (для разных форм свой), например button[data-send-request="callback"].

За отправку отвечает метод sendRequest, который сериализует форму и добавляет в отправку тип формы, который указан в data-send-request, затем формируется ajax запрос. Ответ от сервера приходит в json encode, если есть ошибки, и, если ошибок нет, то пустая строка (также в json encode). При успешной отправки, запускается метод validate, который сопоставляет ошибки из ответа с input[name] в DOM, и если такой input найден, то добавляет элемент с классом .form-error (в начале каждого запуска validate, все элементы .form-error удаляются).

Ajax запрос отправляется на url указанный в form[action]

Для того элемент .form-error записался в DOM, группа одного или несколько input должны быть обернута в элемент с атрибутов data-form-group, например:
```
.form-group[data-form-group]
   input[type="text" name="name" value="Имя"]
   //ошибка запишется в конец атрибута data-form-group
```
Если ошибки не найдены, то validate переходит к успешной отправке формы, в которой запускается switch для каждого data-send-request (необходимо вручную описывать каждый тип успешной отправки).

После отправки формы, нужно показать модальное окно и очистить форму (в методе validate описан шаблон такого применения).
#### Пример формы с валидацией элементов
```
   //Для ввода только цифр используется метод validateOnlyNum и атрибут data-num-only
      input[type="text" name="" placeholder="" data-num-only]
   
   //Для ввода только цифр используется метод validateMaxNum и атрибуты data-num-only data-num-only-max
   input[type="text" name="" placeholder="" data-num-only data-num-only-max="10"]
   
   //Ввод с максимальным кол-вом символов
   .form-group[data-form-group]
       textarea[name="phone" placeholder="Сообщение" data-symbols-max="10"]
       .form-info[data-symbols-length]
   
   //Кнопка с состоянием disabled, если не отмечен чекбокс
   //Состояние описывает метод validateCheckbox
   //Для кнопки необходим атрибут data-agree-btn
   //Для чекбокса необходим атрибит data-agree-inp
   button.btn[type="submit" class="btn" data-send-request="test" data-agree-btn]
   .note.note_btn
    label.checkbox
        input.checkbox__input[type="checkbox" name="personal-aggree" checked data-agree-inp]
        span.checkbox__text
```
   
### Папка plugins
В папке содержатся скрипты, подключающие к проекту различные библиотеки node modules:

#### AutoSizeTextarea - автоматическое изменение высоты textarea при вводе текста.
Используется библиотека [Autosize](https://www.jacklmoore.com/autosize/). Для работы достаточно прописать в textarea атрибут [data-autosize-textarea]:<br>

```
<textarea
   data-autosize-textarea
   name="comment"
   rows="1">
</textarea>
```

#### DatePicker - плагин для выбора даты.
Работает на основе библиотеки [Flatpickr](https://flatpickr.js.org/). Подключение - прописать в инпут дата-атрибут [data-date-input]:<br>
```
<input
   type="text"
   name="date"
   data-date-input>
```

#### GalSlider - cлайдер для галереи с миниатюрами.
Для слайдера используется библиотека [Swiper](https://swiperjs.com/)

Для увелечения изображений используется [Fslightbox](https://fslightbox.com/)
Структура слайдера:

```
.nx-gal-slider[data-gal]
     .nx-gal-slider__main[data-gal-slider]
         .swiper-wrapper.nx-gal-slider__main-wrap
             a.swiper-slide.nx-gal-slider__main-slide[data-fslightbox="gal"]
                 img.nx-gal-slider__main-img

         .nx-gal-slider__prev[data-gal-prev]
             .nx-gal-slider__prev-icon
         .nx-gal-slider__next[data-gal-next]
             .nx-gal-slider__next-icon

     .nx-gal-slider__thumbs[data-gal-thumb]
         .swiper-wrapper.nx-gal-slider__thumbs-wrap
             .swiper-slide.nx-gal-slider__thumbs-slide[data-gal-thumb-slide][style="background-image: url()"]
```
Пример использования можно посмотреть в **templates/_nx-blocks/_gal-slider.php**

#### ListSlider - слайдер элементов.
Для слайдера используется библиотека [Swiper](https://swiperjs.com/)
В проекте можно использовать несколько слайдеров. Каждому слайдеру присваивается имя в data-атрибут [data-list-slider] Конфигурация каждого слайдера прописывается в классе ListSlider через конструкцию switch-case.
##### Для промо-слайдера, к примеру, прописываем следующую html-структуру:  #####
```
.nx-list-slider
   .nx-list-slider__slider[data-list-slider="promo"]
      .swiper-wrapper
         .swiper-slide
         
      .nx-list-slider__prev[data-list-slider-prev]
          .nx-list-slider__prev-icon
      .nx-list-slider__next[data-list-slider-next]
          .nx-list-slider__next-icon
```
В ListSlider.js прописываем конфигурацию: 
```
   switch (currentSlider) {
      case 'promo':
           params = {
               параметры слайдера
           }
           break;
```
Пример использования можно посмотреть в **templates/_nx-blocks/_list-slider.php**

#### Modal - модальное окно.
Используется библиотека [Micromodal](https://micromodal.vercel.app/).  
В качестве триггера открытия используется data-атрибут [data-custom-open], для закрытия [data-custom-close]. Пример верстки модальных окон в папке **\templates\_modals**.

#### NumberAnimate - анимация чисел в виде счетчика
Используется библиотека [CountUp.js](https://inorganik.github.io/countUp.js/).
Для анамирования числа в data-атрибут [data-anim-num] указываем финальную цифру:

>.nx-advans__num.factoid [data-anim-num="101"]

#### RangeSlider - слайдер диапазона. Применяется, например в фильтрах.
Используется библиотека [noUiSlider](https://refreshless.com/nouislider/).

Пример структуры: 

```   
   .range-slider" [data-range]
     .range-slider__inputs
         input.nx-form-element [type="text" name="attrs[600] data-range-inp data-ui-min="10"
             input.nx-form-element [type="text" name="attrs[600] data-range-inp data-ui-max="100"
     .ui-slider [data-ui-slider data-name="attrs[600]" data-ui-min="10" data-ui-max="100" data-step="1"]
```
Пример использования можно посмотреть на странице **pages/catalog-category.php**

#### Rating - Звездный рейтинг. 
Используется библиотека [Rater.js](https://auxiliary.github.io/rater/).
Html-структура: 
```
   rating.data-rating
      input [data-rating-input type="text" hidden]
```

#### ScrollbarCustom - Кастомный скролл.

Для кастомного скролла используется библиотека [OverlayScrollBars]
(https://kingsora.github.io/OverlayScrollbars/)
Для применения кастомного скролла на скролящийся блок добавляем data-атрибут [data-custom-scroll]
> div[data-custom-scroll]

Стили скролла описываются в файле **assets/scss/themes/_overlay-scrollbars-theme.scss**

#### SelectCustom - кастомный селект
Используется бииблиотека [Select2](https://select2.org/).
Для применения в теге select нужно прописать data-атрибут [data-custom-select]. В атрибут [data-placeholder] указываем плейсхолдер:

```
   <select name="" id="" data-custom-select data-placeholder="Выберите товар">
      <option value="1">Товар 1</option>
      <option value="1">Товар 2</option>
   </select>
```
Стили для кастомного селекта расположены в **assets/scss/themes/_select2-theme.scss**.

#### Tabs - табы.
Иcпользуется бииблиотека [HandyCollapse](https://handy-collapse.netlify.app/). 
Для использования к тригеру добавляем data-атрибут [data-tab-btn], к контенту [data-tab-content]. К активному табу и контенту добавляется класс .is-active В атрибутах указывает одинаковые значения:
```
   .nx-tabs
      .nx-tabs__item
         .nx-tabs__link.is-active[data-tab-btn="tab-1"]
      .nx-tabs__item
         .nx-tabs__link[data-tab-btn="tab-2"]
         
   .tab-content.is-active[data-tab-content="tab-1"]
   .tab-content[data-tab-content="tab-2"]
```