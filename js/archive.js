//アーカイブページのみで使用するスクリプト
document.addEventListener("DOMContentLoaded", function() {

  //カテゴリ選択によるフィルター
  const filterButtons = document.querySelectorAll(".archiveList__filterBtn");
  const cards = document.querySelectorAll(".archiveList__cardItem");

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const filter = button.getAttribute("data-filter");

      // ボタンのアクティブ状態を切り替え
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      // 一旦すべてのカードを非表示にする
      cards.forEach((card) => {
        card.style.display = "none";
      });

      // 少し遅れて対象のカードを表示
      setTimeout(() => {
        cards.forEach((card) => {
          const category = card.getAttribute("data-category");

          if (filter === "all" || category === filter) {
            card.style.display = "block"; // 対象のカードを表示
          }
        });
      }, 100); // 100msの遅延を設定
    });
  });

  //フェードアウト後に完全に非表示にする
  cards.forEach(card => {
    card.addEventListener('transitionend', (event) => {
      // opacityのtransitionが終了したときのみ処理を実行
      if (event.propertyName === 'opacity' && card.classList.contains('hidden')) {
        card.style.display = 'none';
      }
    });
  });


});