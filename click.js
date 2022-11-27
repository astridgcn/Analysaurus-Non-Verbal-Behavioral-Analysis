function buttonClicked(btn) {
    btn.click_counter = (btn.click_counter || 0) + 1;
    document.getElementById('num_clicks_feedback').textContent =
      `L'indice "${btn.getAttribute('data-id')}" a été compté ${btn.click_counter} fois.`;
    btn.setAttribute('value',btn.click_counter);
    name = "h_"+btn.getAttribute('name');
    document.getElementsByName(name)[0].value = btn.click_counter;
    }