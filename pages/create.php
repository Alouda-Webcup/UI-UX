<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>TheEnd.page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code&family=Luckiest+Guy&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/create.css" />
</head>
<body>
  <button id="toggleSidebar" aria-expanded="true" aria-controls="formSidebar">≡ Menu</button>

  <div id="formSidebar">
    <h2 class="mb-4 text-success">// Crée ta sortie</h2>
    <form id="mainForm" onsubmit="return false;">
      <div class="mb-3">
        <label for="titre" class="form-label">&gt; Titre</label>
        <input type="text" class="form-control" id="titre" placeholder="TheEnd.page" />
      </div>

      <div class="mb-3">
        <label for="pseudo" class="form-label">&gt; Pseudo</label>
        <input type="text" class="form-control" id="pseudo" placeholder="e.g. HackerMax2000" />
      </div>

      <div class="mb-3">
        <label for="ton" class="form-label">&gt; Ton</label>
        <select class="form-select" id="ton">
          <option selected>Dramatique 🎭</option>
          <option>Ironique 😏</option>
          <option>Rageux 💢</option>
          <option>Touchant 😭</option>
          <option>Poétique 🌙</option>
          <option>Cringe 🌈</option>
        </select>
      </div>

      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="toggleMusic" checked />
        <label class="form-check-label" for="toggleMusic">🎵 Activer musique de fond</label>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">&gt; Message final</label>
        <textarea class="form-control" id="message" rows="5" placeholder="echo 'Goodbye world';"></textarea>
      </div>

    <div class="mb-3">
  <label for="gifSearchInput" class="form-label">&gt; Rechercher un GIF</label>
  <input type="text" id="gifSearchInput" class="form-control" placeholder="Tape ton mot-clé GIF..." />
  <div id="gifSearchArea"></div>
</div>

    </form>
  </div>

  <div class="preview-area sidebar-open" id="previewArea" style="position: relative;">
    <div class="a4-sheet" id="previewBox" style="position: relative; overflow: hidden;">
      <div class="preview-box">
        <div class="title-main" id="previewTitre">TheEnd.page</div>
        <div id="previewPseudo">[Pseudo]</div>
        <p id="previewMessage">[Message]</p>
      </div>
    </div>
  </div>

  <audio id="backgroundAudio"></audio>

  <script>
    const toggleSidebarBtn = document.getElementById("toggleSidebar");
    const formSidebar = document.getElementById("formSidebar");
    const previewArea = document.getElementById("previewArea");

    const titreInput = document.getElementById("titre");
    const pseudoInput = document.getElementById("pseudo");
    const tonSelect = document.getElementById("ton");
    const messageInput = document.getElementById("message");
    const toggleMusicCheckbox = document.getElementById("toggleMusic");

    const previewBox = document.getElementById("previewBox");
    const previewTitre = document.getElementById("previewTitre");
    const previewPseudo = document.getElementById("previewPseudo");
    const previewMessage = document.getElementById("previewMessage");

    const audio = document.getElementById("backgroundAudio");

    const gifSearchInput = document.getElementById("gifSearchInput");
    const gifSearchArea = document.getElementById("gifSearchArea");

    const tonesMusic = {
      "Dramatique 🎭": "../assets/sound/dramatic.mp3",
      "Ironique 😏": "../assets/sound/ironique.mp3",
      "Rageux 💢": "../assets/sound/rageante.mp3",
      "Touchant 😭": "../assets/sound/touchante.mp3",
      "Poétique 🌙": "../assets/sound/poetique.mp3",
      "Cringe 🌈": "../assets/sound/cringe.mp3"
    };

    let animationInterval;

    toggleSidebarBtn.addEventListener("click", () => {
      const isHidden = formSidebar.classList.toggle("hidden");
      toggleSidebarBtn.setAttribute("aria-expanded", isHidden ? "false" : "true");
      previewArea.classList.toggle("sidebar-open", !isHidden);
      previewArea.classList.toggle("sidebar-closed", isHidden);
    });

    function clearRain() {
      const drops = previewBox.querySelectorAll(".rain-drop");
      drops.forEach(drop => drop.remove());
    }

    function clearEmojis() {
      const emojis = previewBox.querySelectorAll(".emoji-effect, .flower");
      emojis.forEach(el => el.remove());
    }

    function addRain() {
      for(let i = 0; i < 40; i++) {
        const drop = document.createElement('div');
        drop.classList.add('rain-drop');
        drop.style.left = (Math.random() * 100) + "%";
        drop.style.top = (Math.random() * -10) + "px";
        drop.style.animationDuration = (Math.random() * 1 + 0.8) + "s";
        drop.style.animationDelay = (Math.random() * 10) + "s";
        previewBox.appendChild(drop);
      }
    }

    function addFallingEmojis(emoji) {
      for (let i = 0; i < 15; i++) {
        const el = document.createElement('div');
        el.className = 'emoji-effect';
        el.style.left = Math.random() * 100 + '%';
        el.style.top = '-40px';
        el.textContent = emoji;
        el.style.animation = 'fallAndSplat 2s ease forwards';
        previewBox.appendChild(el);
      }
    }

    function addPopEmojis(emoji) {
      for (let i = 0; i < 10; i++) {
        const el = document.createElement('div');
        el.className = 'emoji-effect';
        el.textContent = emoji;
        el.style.left = Math.random() * 90 + '%';
        el.style.top = Math.random() * 80 + '%';
        previewBox.appendChild(el);
        setTimeout(() => el.remove(), 700);
      }
    }

    function addFlowerEmojis() {
      for (let i = 0; i < 10; i++) {
        const flower = document.createElement('div');
        flower.className = 'flower';
        flower.textContent = '🌸';
        flower.style.left = Math.random() * 90 + '%';
        flower.style.top = Math.random() * 90 + '%';
        previewBox.appendChild(flower);
        setTimeout(() => flower.remove(), 3000);
      }
    }

    function updateColorByTone(tone) {
      previewBox.classList.remove("cringe-background");
      previewBox.style.background = "";
      previewBox.style.color = "";
      previewTitre.style.color = "";
      previewPseudo.style.color = "";
      previewMessage.style.color = "";

      switch (tone) {
        case "Dramatique 🎭":
          previewBox.style.background = "linear-gradient(to bottom, #4b0082, #9370db)";
          previewBox.style.color = "#d1b3ff";
          break;
        case "Ironique 😏":
          previewBox.style.background = "linear-gradient(to right, #fceabb, #f8b500)";
          previewBox.style.color = "#3a2e00";
          break;
        case "Rageux 💢":
          previewBox.style.background = "linear-gradient(45deg, #8b0000, #ff0000)";
          previewBox.style.color = "#fff";
          break;
        case "Touchant 😭":
          previewBox.style.background = "linear-gradient(to bottom, #ccefff, #4fc3f7)";
          previewBox.style.color = "#003e6b";
          break;
        case "Poétique 🌙":
          previewBox.style.background = "linear-gradient(45deg, #b19cd9, #283593)";
          previewBox.style.color = "#e0d7f5";
          break;
        case "Cringe 🌈":
          previewBox.classList.add("cringe-background");
          break;
      }
    }

    function updateAudio(tone) {
      const isCringe = tone === "Cringe 🌈";

      if (toggleMusicCheckbox.checked && tonesMusic[tone]) {
        audio.pause();
        audio.removeAttribute("src");
        audio.ontimeupdate = null;

        audio.src = tonesMusic[tone];
        audio.load();

        audio.onloadedmetadata = () => {
          if (isCringe) {
            audio.currentTime = 51;
          }
          audio.play().catch(() => {});
        };

        if (isCringe) {
          audio.ontimeupdate = () => {
            if (audio.currentTime >= 66) {
              audio.currentTime = 51;
              audio.play().catch(() => {});
            }
          };
          audio.loop = false;
        } else {
          audio.ontimeupdate = null;
          audio.loop = true;
        }
      } else {
        audio.pause();
        audio.removeAttribute("src");
        audio.ontimeupdate = null;
      }
    }

    function updatePreview() {
      const tone = tonSelect.value;
      previewTitre.textContent = titreInput.value.trim() || "TheEnd.page";
      previewPseudo.textContent = pseudoInput.value.trim() || "[Pseudo]";
      previewMessage.textContent = messageInput.value.trim() || "[Message]";

      updateColorByTone(tone);
      updateAudio(tone);

      clearInterval(animationInterval);
      clearRain();
      clearEmojis();

      function launchAnimations() {
        clearRain();
        clearEmojis();

        switch (tone) {
          case "Touchant 😭":
            addRain();
            break;
          case "Dramatique 🎭":
            addPopEmojis("😱");
            break;
          case "Ironique 😏":
            addPopEmojis("😏");
            break;
          case "Rageux 💢":
            addPopEmojis("😡");
            break;
          case "Poétique 🌙":
            addFlowerEmojis();
            break;
        }
      }

      launchAnimations();
      animationInterval = setInterval(launchAnimations, 3000);
    }

    titreInput.addEventListener("input", updatePreview);
    pseudoInput.addEventListener("input", updatePreview);
    messageInput.addEventListener("input", updatePreview);
    tonSelect.addEventListener("change", updatePreview);
    toggleMusicCheckbox.addEventListener("change", () => {
      if (!toggleMusicCheckbox.checked) {
        audio.pause();
        audio.removeAttribute("src");
        audio.ontimeupdate = null;
      } else {
        updateAudio(tonSelect.value);
      }
    });

    // GIF search & drag-drop
    let selectedGif = null;

    function fetchGifs(query) {
      if (!query.trim()) {
        gifSearchArea.innerHTML = "";
        return;
      }

      // Utilisation de l'API Giphy publique (clé demo)
      const apiKey = "VXPynFA6SFzRTln2Ifp0yoSByH5JsU2g";
      const url = `https://api.giphy.com/v1/gifs/search?q=${encodeURIComponent(query)}&limit=15&api_key=${apiKey}`;

      fetch(url)
        .then(res => res.json())
        .then(data => {
          gifSearchArea.innerHTML = "";
          data.data.forEach(gif => {
            const img = document.createElement("img");
            img.src = gif.images.fixed_width.url;
            img.alt = gif.title;
            img.title = gif.title;
            img.tabIndex = 0;

            img.addEventListener("click", () => addGifToPreview(img.src));
            img.addEventListener("keypress", e => {
              if (e.key === "Enter") addGifToPreview(img.src);
            });

            gifSearchArea.appendChild(img);
          });
        })
        .catch(() => {
          gifSearchArea.innerHTML = "<p>Erreur lors de la recherche GIF.</p>";
        });
    }

    gifSearchInput.addEventListener("input", e => {
      fetchGifs(e.target.value);
    });

    function addGifToPreview(src) {
      const container = document.createElement("div");
      container.className = "gif-container";
      container.style.left = "10px";
      container.style.top = "10px";

      const img = document.createElement("img");
      img.src = src;
      img.alt = "GIF ajouté";
      img.style.maxWidth = "120px";
      img.style.maxHeight = "120px";
      img.style.display = "block";

      const btn = document.createElement("button");
      btn.className = "gif-remove-btn";
      btn.textContent = "×";
      btn.setAttribute("aria-label", "Supprimer GIF");

      btn.addEventListener("click", (e) => {
        e.stopPropagation();
        container.remove();
        if (selectedGif === container) selectedGif = null;
      });

      container.appendChild(img);
      container.appendChild(btn);
      previewBox.appendChild(container);

      container.addEventListener("mousedown", dragStart);
      container.addEventListener("touchstart", dragStart);

      container.addEventListener("click", () => {
        if (selectedGif && selectedGif !== container) {
          selectedGif.classList.remove("selected");
        }
        selectedGif = container;
        container.classList.add("selected");
      });
    }

    let dragTarget = null;
    let offsetX = 0;
    let offsetY = 0;

    function dragStart(e) {
      dragTarget = e.currentTarget;
      const rect = dragTarget.getBoundingClientRect();
      offsetX = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
      offsetY = (e.touches ? e.touches[0].clientY : e.clientY) - rect.top;

      document.addEventListener("mousemove", dragMove);
      document.addEventListener("mouseup", dragEnd);
      document.addEventListener("touchmove", dragMove);
      document.addEventListener("touchend", dragEnd);
    }

    function dragMove(e) {
      if (!dragTarget) return;

      e.preventDefault();
      const parentRect = previewBox.getBoundingClientRect();
      let x = (e.touches ? e.touches[0].clientX : e.clientX) - parentRect.left - offsetX;
      let y = (e.touches ? e.touches[0].clientY : e.clientY) - parentRect.top - offsetY;

      // Limiter dans le container
      x = Math.min(Math.max(0, x), parentRect.width - dragTarget.offsetWidth);
      y = Math.min(Math.max(0, y), parentRect.height - dragTarget.offsetHeight);

      dragTarget.style.left = x + "px";
      dragTarget.style.top = y + "px";
    }

    function dragEnd() {
      dragTarget = null;
      document.removeEventListener("mousemove", dragMove);
      document.removeEventListener("mouseup", dragEnd);
      document.removeEventListener("touchmove", dragMove);
      document.removeEventListener("touchend", dragEnd);
    }
    

    // Initial update
    updatePreview();
  </script>
</body>
</html>
