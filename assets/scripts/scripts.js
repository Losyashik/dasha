$(`.topbar__burger, .topbar__li`).click(() => {
  if (window.innerWidth < 1024) {
    $(`.topbar__ul`).toggleClass(`topbar__ul--active`);
    if ($(`.topbar__ul`).hasClass(`topbar__ul--active`))
      $(`body`).css({
        position: "fixed",
      });
    else
      $(`body`).css({
        position: "static",
      });
  }
});
