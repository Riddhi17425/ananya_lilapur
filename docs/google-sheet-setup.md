# Send inquiries to a Google Sheet

Every form submission is saved in the database first. If `GOOGLE_SHEET_URL` is set, it is also added as a new row
in a Google Sheet, in a tab named after the form:

| Tab name | Form |
|---|---|
| Enquire Now | Admissions enquiry, home page call back, pop-up |
| Book a Visit | Book a campus visit |
| Career Applications | Career application |
| Contact Messages | Contact form |
| Notify Me | "Notify Me When Available" |

The tabs and their header rows are created automatically on the first submission.
If Google is down or the URL is wrong, the visitor still gets the thank you page and the error is written to `storage/logs/laravel.log`.

## One-time setup

1. Create a new Google Sheet (any name).
2. Open **Extensions → Apps Script**, delete the sample code and paste this:

```javascript
// Change this to any long random text. Put the same text in GOOGLE_SHEET_SECRET in .env
var SECRET = 'change-me';

function doPost(e) {
  var data = JSON.parse(e.postData.contents);
  if (data.secret !== SECRET) {
    return ContentService.createTextOutput('forbidden');
  }

  var book = SpreadsheetApp.getActiveSpreadsheet();
  var sheet = book.getSheetByName(data.sheet) || book.insertSheet(data.sheet);

  // First row of a new tab = column titles
  if (sheet.getLastRow() === 0) {
    sheet.appendRow(data.headers);
    sheet.getRange(1, 1, 1, data.headers.length).setFontWeight('bold');
    sheet.setFrozenRows(1);
  }

  sheet.appendRow(data.row);
  return ContentService.createTextOutput('ok');
}
```

3. Click **Deploy → New deployment → type: Web app**.
   - Execute as: **Me**
   - Who has access: **Anyone**
4. Copy the **Web app URL**.
5. Add to `.env`:

```
GOOGLE_SHEET_URL=https://script.google.com/macros/s/XXXXXXXX/exec
GOOGLE_SHEET_SECRET=change-me
```

6. Run `php artisan config:clear` and submit a test form.

If you change the script later, use **Deploy → Manage deployments → Edit → New version** so the URL stays the same.
