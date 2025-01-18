window.addEventListener("load", function () {
    // タイピングアニメーションの速度設定（ミリ秒）
    const time = 120;

    // .typing要素を処理
    const elements = document.querySelectorAll(".typing");

    elements.forEach((element) => {
        // テキストを一文字ずつ分割して<span>タグで囲む
        const text = element.textContent;
        const spanText = Array.from(text)
            .map((char) =>
                char !== " "
                    ? `<span style="display:none;">${char}</span>`
                    : " "
            )
            .join("");

        // 要素内のHTMLを更新
        element.innerHTML = spanText;

        // タイピングアニメーション
        const spans = element.querySelectorAll("span");
        spans.forEach((span, i) => {
            setTimeout(() => {
                span.style.display = "inline";
                span.style.opacity = 0;
                span.style.transition = `opacity ${time / 1000}s`;
                span.style.opacity = 1;
            }, time * i);
        });
    });
});
