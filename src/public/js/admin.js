document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('detail-modal');
  const modalBody = modal.querySelector('.modal-body');
  const closeBtn = modal.querySelector('.close-btn');

  // 詳細ボタンをクリックしたときの処理
  document.querySelectorAll('.detail-btn').forEach(button => {
    button.addEventListener('click', () => {
      const contactId = button.getAttribute('data-id');

      // Ajaxでデータを取得（今回はモックとしてHTMLを入れる）
      fetch(`/admin/contact/${contactId}`)
        .then(response => response.text())
        .then(html => {
          modalBody.innerHTML = html;
          modal.style.display = 'flex'; // モーダルを表示
        });
    });
  });

  // 閉じるボタン
  closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  // モーダルの外をクリックして閉じる
  window.addEventListener('click', e => {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });
});
