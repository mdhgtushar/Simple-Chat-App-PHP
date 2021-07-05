
    let scrolled = false; // at bottom?
    let scrolling = false; // scrolling in next msg?
    let listener = false; // does element have content changed listener?
    let contentChanged = false; // kind of obvious
    let alerted = false; // less obvious

    function innerHTMLChanged() {
      contentChanged = true;
    }

    function scrollToBottom(id) {
      if (!id) { id = "scrollable_element"; }
      let DEBUG = 0; // change to 1 and open console
      let dstr = "";

      let e = document.getElementById(id);
      if (e) {
        if (!listener) {
          dstr += "content changed listener not active\n";
          e.addEventListener("DOMSubtreeModified", innerHTMLChanged);
          listener = true;
        } else {
          dstr += "content changed listener active\n";
        }
        let height = (e.scrollHeight - e.offsetHeight); // this isn't perfect
        let offset = (e.offsetHeight - e.clientHeight); // and does this fix it? seems to...
        let scrollMax = height + offset;

        dstr += "offsetHeight: " + e.offsetHeight + "\n";
        dstr += "clientHeight: " + e.clientHeight + "\n";
        dstr += "scrollHeight: " + e.scrollHeight + "\n";
        dstr += "scrollTop: " + e.scrollTop + "\n";
        dstr += "scrollMax: " + scrollMax + "\n";
        dstr += "offset: " + offset + "\n";
        dstr += "height: " + height + "\n";
        dstr += "contentChanged: " + contentChanged + "\n";

        if (!scrolled && !scrolling) {
          dstr += "user has not scrolled\n";
          if (e.scrollTop != scrollMax) {
            dstr += "scroll not at bottom\n";
            e.scroll({
              top: scrollMax,
              left: 0,
              behavior: "auto"
            })
            e.scrollTop = scrollMax;
            scrolling = true;
          } else {
            if (alerted) {
              dstr += "alert exists\n";
            } else {
              dstr += "alert does not exist\n";
            }
            if (contentChanged) { contentChanged = false; }
          }
        } else {
          dstr += "user scrolled away from bottom\n";
          if (!scrolling) {
            dstr += "not auto-scrolling\n";

            if (e.scrollTop >= scrollMax) {
              dstr += "scroll at bottom\n";
              scrolled = false;

              if (alerted) {
                dstr += "alert exists\n";
                let n = document.getElementById("alert");
                n.remove();
                alerted = false;
                contentChanged = false;
                scrolled = false;
              }
            } else {
              dstr += "scroll not at bottom\n";
              if (contentChanged) {
                dstr += "content changed\n";
                if (!alerted) {
                  dstr += "alert not displaying\n";
                  let n = document.createElement("div");
                  e.append(n);
                  n.id = "alert";
                  n.style.position = "absolute";
                  n.classList.add("normal-panel");
                  n.classList.add("clickable");
                  n.classList.add("blink");
                  n.innerHTML = "new content!";

                  let nposy = parseFloat(getComputedStyle(e).height) + 18;
                  let nposx = 18 + (parseFloat(getComputedStyle(e).width) / 2) - (parseFloat(getComputedStyle(n).width) / 2);
                  dstr += "nposx: " + nposx + "\n";
                  dstr += "nposy: " + nposy + "\n";
                  n.style.left = nposx;
                  n.style.top = nposy;

                  n.addEventListener("click", () => {
                    dstr += "clearing alert\n";
                    scrolled = false;
                    alerted = false;
                    contentChanged = false;
                    n.remove();
                  });

                  alerted = true;
                } else {
                  dstr += "alert already displayed\n";
                }
              } else {
                alerted = false;
              }
            }
          } else {
            dstr += "auto-scrolling\n";
            if (e.scrollTop >= scrollMax) {
              dstr += "done scrolling";
              scrolling = false;
              scrolled = false;
            } else {
              dstr += "still scrolling...\n";
            }
          }
        }
      }

      if (DEBUG && dstr) console.log("stb:\n" + dstr);

      setTimeout(() => { scrollToBottom(id); }, 50);
    }

    function scrollMessages(id) {
      if (!id) { id = "scrollable_element"; }
      let DEBUG = 1;
      let dstr = "";

      if (scrolled) {
        dstr += "already scrolled";
      } else {
        dstr += "got scrolled";
        scrolled = true;
      }
      dstr += "\n";

      if (contentChanged && alerted) {
        dstr += "content changed, and alerted\n";
        let n = document.getElementById("alert");
        if (n) {
          dstr += "alert div exists\n";
          let e = document.getElementById(id);
          let nposy = parseFloat(getComputedStyle(e).height) + 18;
          dstr += "nposy: " + nposy + "\n";
          n.style.top = nposy;
        } else {
          dstr += "alert div does not exist!\n";
        }
      } else {
        dstr += "content NOT changed, and not alerted";
      }

      if (DEBUG && dstr) console.log("sm: " + dstr);
    }

    setTimeout(() => { scrollToBottom("messages"); }, 1000);

    /////////////////////
    // HELPER FUNCTION
    //   simulates adding dynamic content to "chat" div
    let count = 0;
    function addContent() {
      let e = document.getElementById("messages");
      if (e) {
        let br = document.createElement("br");
        e.append("test " + count);
        e.append(br);
        count++;
      }
    }
    