//アーカイブページのみで使用するスクリプト
document.addEventListener("DOMContentLoaded", function() {

  //カテゴリ選択によるフィルター
  const filterButtons = document.querySelectorAll(".archiveList__filterBtn");
  const cards = document.querySelectorAll(".archiveList__cardItem");

  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.getAttribute('data-filter');

      // ボタンのアクティブ状態を切り替え
      filterButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      //カードをフィルタリング
      cards.forEach(card => {
        const category = card.getAttribute('data-category');

        if(filter === 'all' || category === filter) {
          card.classList.remove('hidden');
          card.style.display = ''; //再表示時にdisplayをリセット
        } else {
          card.classList.add('hidden');
        }
      });
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