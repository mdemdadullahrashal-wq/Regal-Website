<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'slug' => 'why-automation-matters-for-bd-businesses',
                'title_bn' => 'বাংলাদেশের ব্যবসার জন্য অটোমেশন কেন জরুরি',
                'title_en' => 'Why Automation Matters for Bangladeshi Businesses',
                'excerpt_bn' => 'ম্যানুয়াল খাতা ও স্প্রেডশিটে প্রতিদিন কত সময় আর টাকা নষ্ট হয় — এবং সঠিক সফটওয়্যার দিয়ে কীভাবে তা ফেরত পাবেন।',
                'excerpt_en' => 'How much time and money manual ledgers and spreadsheets waste every day — and how the right software gives it back.',
                'body_bn' => <<<'MD'
বাংলাদেশের বেশিরভাগ ছোট ও মাঝারি ব্যবসা এখনো কাগজের খাতা, স্প্রেডশিট আর ম্যানুয়াল প্রক্রিয়ায় চলে। বিল লেখা হাতে, স্টক মেলানো রাতে, আর রিপোর্ট বানাতে লাগে দিনের পর দিন। বাইরে থেকে এটাকে স্বাভাবিক মনে হলেও, ভেতরে ভেতরে এটা আপনার ব্যবসার **প্রতিদিনের সময় আর টাকা কেড়ে নিচ্ছে** — যা আপনি হয়তো দেখতেই পাচ্ছেন না।

## ম্যানুয়াল কাজে আসলে কী ক্ষতি হয়

- **সময় নষ্ট:** একজন কর্মী দিনে কয়েক ঘণ্টা শুধু খাতায় এন্ট্রি আর হিসাব মেলাতে ব্যয় করে, যা দিয়ে সে বিক্রি বাড়াতে পারত।
- **ভুলের ঝুঁকি:** হাতে হিসাব করলে ভুল হওয়া অনিবার্য। স্টক বা হিসাবের একটা ভুলই মাসের লাভের চিত্র উল্টে দিতে পারে।
- **সিদ্ধান্তে দেরি:** কত বিক্রি হলো, কোন পণ্য বেশি চলছে, কত বাকি পড়ে আছে — সঠিক চিত্র পেতে আপনাকে দিন শেষ পর্যন্ত অপেক্ষা করতে হয়।
- **গ্রাহক হারানো:** ফলো-আপ করতে ভুলে গেলে বা ডেলিভারিতে গড়িমসি হলে গ্রাহক নীরবে চলে যায় প্রতিযোগীর কাছে।

## অটোমেশন ঠিক কী কী বদলে দেয়

### বিলিং ও ইনভেন্টরি
বারকোড স্ক্যানে সেকেন্ডে বিল তৈরি হয়, আর স্টক কমে গেলে **অটো অ্যালার্ট** চলে আসে। হঠাৎ করে প্রোডাক্ট শেষ হয়ে গিয়ে বিক্রি মিস হওয়ার দিন শেষ।

### হিসাব ও রিপোর্ট
প্রতিটি লেনদেন নিজে নিজেই জমা হয়। দিন, সপ্তাহ বা মাসের বিক্রি-খরচ-লাভের রিপোর্ট এক ক্লিকে। সিদ্ধান্ত নিন **ডেটা দেখে, অনুমানে নয়**।

### গ্রাহক সম্পর্ক ও ফলো-আপ
লিড আর ফলো-আপের রিমাইন্ডার অটো চলে আসে — ফলে কোনো সম্ভাব্য গ্রাহক ভুলে হারিয়ে যায় না।

## কোথা থেকে শুরু করবেন

1. প্রতিদিন সবচেয়ে বেশি সময় খায় এমন **একটা কাজ** বেছে নিন (সাধারণত বিলিং বা স্টক ম্যানেজমেন্ট)।
2. সেই কাজের জন্য একটা ক্লাউড টুল চালু করুন।
3. মাসখানেক চালিয়ে সময় ও ভুলের পার্থক্যটা মাপুন।
4. ফল দেখে ধাপে ধাপে পরের কাজটুকু যোগ করুন।

Regal Solution-এর প্রতিটি পণ্য — [পিওএস সফটওয়্যার](/bn/products/pos), [বাস টিকেট বুকিং](/bn/products/bus-ticket), [সেলস CRM](/bn/products/sales-crm) — বাংলাদেশের ব্যবসার জন্যই বানানো, বাংলা ইন্টারফেস ও মোবাইল ব্যাংকিং সাপোর্টসহ। ছোট করে শুরু করুন, আর বড় স্বপ্ন দেখুন।
MD,
                'body_en' => <<<'MD'
Most small and medium businesses in Bangladesh still run on paper ledgers, spreadsheets, and manual processes. Bills written by hand, stock reconciled at night, and reports that take days. From the outside it looks normal, but inside it is quietly **draining your time and money every single day** — and you may not even see it.

## What manual work actually costs you

- **Wasted time:** a staff member spends hours each day just entering data and matching figures — time they could spend selling.
- **Risk of errors:** manual math always makes mistakes. One wrong stock or accounting entry can flip your monthly profit picture.
- **Slow decisions:** you can't know what sold, what's trending, or who owes you until the day ends.
- **Lost customers:** miss a follow-up or delay a delivery, and the customer silently walks to a competitor.

## What automation actually changes

### Billing & inventory
Scan a barcode and bill in seconds, with **automatic low-stock alerts**. The days of running out of stock and missing sales are over.

### Accounting & reports
Every transaction is logged on its own. Daily, weekly, or monthly sales-expense-profit reports are one click away. Decide with **data, not guesswork**.

### Customer relationships & follow-ups
Leads and follow-up reminders arrive automatically — so no potential customer is ever forgotten and lost.

## Where to start

1. Pick the **one task** that eats the most time every day (usually billing or stock management).
2. Turn on a cloud tool for that task.
3. Run it for a month and measure the time and error savings.
4. Then add the next task, step by step.

Every Regal Solution product — [POS Software](/en/products/pos), [Bus Ticket Booking](/en/products/bus-ticket), [Sales CRM](/en/products/sales-crm) — is built for Bangladeshi businesses, with a Bangla interface and mobile-banking support. Start small, dream big.
MD,
                'published_at' => '2026-09-01 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'cloud-vs-desktop-software',
                'title_bn' => 'ক্লাউড বনাম ডেস্কটপ সফটওয়্যার: কোনটা আপনার জন্য?',
                'title_en' => 'Cloud vs Desktop Software: Which Is Right for You?',
                'excerpt_bn' => 'দুই ধরনের সফটওয়্যারের আসল পার্থক্য, সুবিধা-অসুবিধা এবং কোন ব্যবসার জন্য কোনটা সেরা — সহজ ভাষায়।',
                'excerpt_en' => 'The real differences, pros and cons, and which suits which business — in plain language.',
                'body_bn' => <<<'MD'
ব্যবসার সফটওয়্যার কিনতে গেলে একটা সিদ্ধান্ত বারবার সামনে আসে: **ক্লাউড নাকি ডেস্কটপ?** ভুল পছন্দ করলে পরে পুরো সিস্টেম বদলাতে হয় — সময় আর টাকা দুটোই খরচ হয়। তাই শুরুতে একটু বুঝে নেওয়াই ভালো।

## ক্লাউড সফটওয়্যার কী

ক্লাউড সফটওয়্যার ইন্টারনেট সার্ভারে চলে, ব্রাউজার বা অ্যাপ দিয়ে **যেকোনো জায়গা থেকে** ব্যবহার করা যায়। আপনার কম্পিউটারে কিছু ইনস্টল করতে হয় না, আর ডেটা নিজে নিজেই নিরাপদ সার্ভারে ব্যাকআপ হয়।

### ক্লাউডের সুবিধা
- **যেকোনো ডিভাইস থেকে অ্যাক্সেস:** দোকান, বাড়ি বা ভ্রমণে — মোবাইল দিয়েই কাজ চলে।
- **অটো-আপডেট:** নতুন ফিচার আর নিরাপত্তা প্যাচ নিজে নিজেই চলে আসে।
- **ডেটা নিরাপদ:** কম্পিউটার নষ্ট হলেও ডেটা থাকে, কারণ তা ক্লাউডে সংরক্ষিত।
- **একাধিক শাখা:** একই ডেটা সব শাখা থেকে একসাথে দেখা যায়।

## ডেস্কটপ সফটওয়্যার কী

ডেস্কটপ সফটওয়্যার একটা নির্দিষ্ট কম্পিউটারে ইনস্টল হয়ে সেখানেই চলে, আর ডেটাও সেই মেশিনে জমা থাকে।

### ডেস্কটপ কখন মানানসই
- ইন্টারনেট একেবারেই নেই এমন জায়গায় কাজ করলে।
- শুধু একটা মেশিনে, একজন মানুষ ব্যবহার করলে।

তবে মনে রাখবেন: ডেস্কটপের ডেটা **কম্পিউটার নষ্ট বা চুরি হলেই হারিয়ে যায়**, আর একাধিক শাখা চালানো কঠিন হয়ে পড়ে।

## কোনটা আপনার জন্য?

| অবস্থা | সেরা পছন্দ |
| --- | --- |
| একাধিক শাখা বা রিমোট টিম | ক্লাউড |
| মোবাইল থেকে অ্যাক্সেস দরকার | ক্লাউড |
| সম্পূর্ণ অফলাইন, এক মেশিন | ডেস্কটপ |

বাংলাদেশের বাস্তবতায় — যেখানে ইন্টারনেট মাঝেমধ্যে অস্থির থাকে — সবচেয়ে ভালো সমাধান হলো **ক্লাউড + অফলাইন-ফার্স্ট ফিচার**। Regal Solution-এর সব পণ্য ঠিক এভাবেই বানানো: [পিওএস সফটওয়্যার](/bn/products/pos)-এ ইন্টারনেট চলে গেলেও বিলিং বন্ধ থাকে না, সংযোগ ফিরলে নিজে নিজেই সিঙ্ক হয়ে যায়।
MD,
                'body_en' => <<<'MD'
When buying business software, one decision keeps coming up: **cloud or desktop?** Choose wrong and you may have to replace the whole system later — costing both time and money. So it's worth understanding it upfront.

## What cloud software is

Cloud software runs on internet servers and is accessible **from anywhere** through a browser or app. There's nothing to install on your computer, and data is backed up automatically to secure servers.

### Cloud benefits
- **Access from any device:** shop, home, or travel — work from your phone.
- **Auto-updates:** new features and security patches arrive automatically.
- **Data stays safe:** even if your computer breaks, your data survives because it lives in the cloud.
- **Multiple branches:** the same data is visible from all branches at once.

## What desktop software is

Desktop software is installed on one specific computer and runs there, with data stored on that machine.

### When desktop makes sense
- In places with absolutely no internet.
- A single person on a single machine.

But remember: desktop data **disappears if the computer breaks or is stolen**, and running multiple branches becomes hard.

## Which is right for you?

| Situation | Best choice |
| --- | --- |
| Multiple branches or remote team | Cloud |
| Need mobile access | Cloud |
| Fully offline, one machine | Desktop |

In Bangladesh — where internet can be unstable — the best answer is usually **cloud with offline-first features**. Every Regal Solution product is built exactly this way: with [POS Software](/en/products/pos), billing keeps working even when the internet drops, and everything syncs automatically when the connection returns.
MD,
                'published_at' => '2026-09-05 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'sme-digitization-roadmap',
                'title_bn' => 'SME ডিজিটালাইজেশনের সহজ রোডম্যাপ',
                'title_en' => 'A Simple Roadmap to SME Digitization',
                'excerpt_bn' => 'ছোট ব্যবসা কীভাবে চার ধাপে — বিলিং থেকে CRM পর্যন্ত — ভেঙে না পড়ে ডিজিটাল হবে।',
                'excerpt_en' => 'How a small business goes digital in four steps — from billing to CRM — without breaking anything.',
                'body_bn' => <<<'MD'
"ডিজিটাল হব" ভাবলেই অনেকে একসাথে সব বদলে ফেলতে চান — আর তাতেই গোলমাল বাধে। সঠিক উপায় হলো **একবারে এক ধাপ**, প্রতিটি ধাপ মেপে মেপে। নিচে একটা বাস্তব রোডম্যাপ দিলাম যা যেকোনো ছোট বা মাঝারি ব্যবসা অনুসরণ করতে পারে।

## ধাপ ১: বিলিং অটোমেট করুন

প্রথম ধাপ সবসময় বিলিং। হাতে বিল লেখা আর ক্যালকুলেটরে হিসাব করা বন্ধ করুন। বারকোড স্ক্যান আর অটো-রসিদে **প্রতিদিন কয়েক ঘণ্টা বাঁচবে**, আর ভুলও প্রায় শূন্য হয়ে যাবে। [পিওএস সফটওয়্যার](/bn/products/pos) দিয়ে এটা এক দিনেই চালু করা যায়।

## ধাপ ২: ইনভেন্টরি ও স্টক ট্র্যাক করুন

বিলিং অটোমেট হলে স্টক নিজে নিজেই কমতে থাকে। এবার লো-স্টক অ্যালার্ট চালু করুন, যাতে কোন পণ্য কবে শেষ হবে তা আগে থেকে জানতে পারেন। **হঠাৎ স্টক-আউটে বিক্রি মিস** — এই সমস্যা চিরতরে দূর হবে।

## ধাপ ৩: রিপোর্টিং চালু করুন

ডেটা জমা হতে শুরু করলে রিপোর্টের মানেই হয়। কোন পণ্য সবচেয়ে বেশি বিক্রি হয়, কোন সময় বিক্রি বেশি, কত লাভ হচ্ছে — এসব দেখুন এবং সে অনুযায়ী **কেনাকাটা আর মার্কেটিংয়ের সিদ্ধান্ত** নিন।

## ধাপ ৪: CRM দিয়ে গ্রাহক সম্পর্ক ম্যানেজ করুন

শেষ ধাপে গ্রাহককে কেন্দ্রে আনুন। [সেলস CRM](/bn/products/sales-crm) দিয়ে লিড ট্র্যাক করুন, ফলো-আপের রিমাইন্ডার নিন, আর কোটেশন-ইনভয়েস অটোমেট করুন। নিয়মিত গ্রাহকদের ইতিহাস দেখে তাদের আরও ভালো সার্ভিস দিন।

## মনে রাখবেন

- একসাথে সব বদলাতে যাবেন না — **একবারে একটা ধাপ**।
- প্রতিটি ধাপ চালু করে অন্তত এক মাস দিন, তারপর পরেরটা।
- কর্মীদের প্রশিক্ষণ দিন — টুল যত সহজ, তারা তত দ্রুত মানিয়ে নেবে।

ডিজিটাল হওয়া কোনো একদিনের কাজ নয়, এটা একটা যাত্রা। সঠিক ধাপে এগোলে ছোট ব্যবসাও বড় এন্টারপ্রাইজের মতো চটপটে হয়ে ওঠে।
MD,
                'body_en' => <<<'MD'
When people decide to "go digital", they often try to change everything at once — and that's exactly where it goes wrong. The right way is **one step at a time**, measuring each one. Here's a practical roadmap any small or medium business can follow.

## Step 1: Automate billing

The first step is always billing. Stop writing bills by hand and doing math on a calculator. Barcode scanning and auto-receipts **save hours every day** and nearly eliminate errors. You can get started in a single day with [POS Software](/en/products/pos).

## Step 2: Track inventory & stock

Once billing is automated, stock starts updating on its own. Now turn on low-stock alerts so you know in advance when a product is about to run out. **Missing sales due to sudden stockouts** — that problem disappears for good.

## Step 3: Turn on reporting

Once data starts accumulating, reports become meaningful. See which products sell most, which hours are busiest, and how much profit you're making — then make **buying and marketing decisions** based on that.

## Step 4: Manage customer relationships with CRM

The final step puts the customer at the centre. Track leads, set follow-up reminders, and automate quotes and invoices with [Sales CRM](/en/products/sales-crm). Use regular customers' history to serve them even better.

## Keep in mind

- Don't change everything at once — **one step at a time**.
- Run each step for at least a month before moving to the next.
- Train your staff — the simpler the tool, the faster they adapt.

Going digital isn't a one-day task, it's a journey. With the right steps, a small business becomes as agile as a large enterprise.
MD,
                'published_at' => '2026-09-10 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'data-security-basics',
                'title_bn' => 'ব্যবসার ডেটা নিরাপদ রাখার মৌলিক নিয়ম',
                'title_en' => 'Basic Rules to Keep Your Business Data Safe',
                'excerpt_bn' => 'পাসওয়ার্ড, ব্যাকআপ, অ্যাক্সেস কন্ট্রোল ও এনক্রিপশন — ব্যবসার ডেটা সুরক্ষার চারটি ভিত্তি।',
                'excerpt_en' => 'Passwords, backups, access control, and encryption — the four pillars of protecting business data.',
                'body_bn' => <<<'MD'
আপনার ব্যবসার সবচেয়ে মূল্যবান সম্পদ কী? পণ্য নয়, টাকাও নয় — **আপনার ডেটা**। গ্রাহকের তথ্য, বিক্রির হিসাব, স্টক, বাকির খাতা — এসব হারিয়ে গেলে বা চুরি হলে ব্যবসার ভিত কেঁপে যায়। ভালো খবর হলো, কয়েকটা মৌলিক নিয়ম মেনে চললেই বড় বিপদ এড়ানো যায়।

## ১. শক্তিশালী পাসওয়ার্ড ব্যবহার করুন

- কমপক্ষে ১২ অক্ষরের পাসওয়ার্ড, যাতে বড়-ছোট হাতের অক্ষর, সংখ্যা ও চিহ্ন মিশিয়ে দিন।
- একই পাসওয়ার্ড একাধিক জায়গায় ব্যবহার করবেন না।
- সম্ভব হলে **টু-ফ্যাক্টর অথেনটিকেশন (2FA)** চালু করুন — পাসওয়ার্ড ফাঁস হলেও অ্যাকাউন্ট নিরাপদ থাকে।

## ২. নিয়মিত ব্যাকআপ নিন

কম্পিউটার নষ্ট, চুরি বা র‍্যানসমওয়্যার আক্রমণ — যেকোনো সময় হতে পারে। **অটো ব্যাকআপ** থাকলে একদিনের মধ্যে পুরো ডেটা ফেরত পাবেন। ক্লাউড সফটওয়্যারে এই ব্যাকআপ সাধারণত নিজে নিজেই হয়, আপনাকে আলাদা করে ভাবতে হয় না।

## ৩. অ্যাক্সেস কন্ট্রোল করুন

সবাইকে সব ডেটা দেখতে দেবেন না। ক্যাশিয়ার শুধু বিলিং দেখবে, ম্যানেজার রিপোর্ট দেখবে, আর মালিক দেখবে সবকিছু। **রোল-ভিত্তিক অ্যাক্সেস** চালু থাকলে ভুল আর দুর্নীতি দুটোই কমে — কে কী করেছে তার লগও থাকে।

## ৪. এনক্রিপশন ও নিরাপদ সংযোগ

ডেটা ট্রান্সফার ও সংরক্ষণে এনক্রিপশন (যেমন ২৫৬-বিট) থাকলে চুরি হলেও তা পড়া যায় না। আর সবসময় **HTTPS** সংযোগ ব্যবহার করুন — লগইন বা পেমেন্টের সময় বিশেষ করে।

## Regal Solution কীভাবে সাহায্য করে

আমাদের প্রতিটি পণ্যেই আছে **২৫৬-বিট এনক্রিপশন, রোল-ভিত্তিক অ্যাক্সেস কন্ট্রোল আর দৈনিক অটো-ব্যাকআপ**। ফলে আপনি ব্যবসায় মন দিতে পারেন, ডেটার নিরাপত্তা নিয়ে দুশ্চিন্তা করতে হয় না। কোন পণ্যটি আপনার জন্য — দেখুন আমাদের [সব সমাধান](/bn/products)।
MD,
                'body_en' => <<<'MD'
What is the most valuable asset of your business? Not your products, not even your money — **your data**. Customer information, sales records, stock, credit ledgers — lose or leak these and the foundation of your business shakes. The good news: a few basic rules are enough to avoid the biggest risks.

## 1. Use strong passwords

- At least 12 characters, mixing upper- and lower-case letters, numbers, and symbols.
- Never reuse the same password across multiple places.
- Enable **two-factor authentication (2FA)** where possible — even a leaked password keeps the account safe.

## 2. Back up regularly

A broken computer, theft, or a ransomware attack can happen anytime. With **automatic backups**, you can recover everything within a day. Cloud software usually handles this automatically — nothing to think about.

## 3. Control access

Don't let everyone see all data. A cashier sees only billing, a manager sees reports, and the owner sees everything. **Role-based access** reduces both errors and fraud — and keeps a log of who did what.

## 4. Encryption & secure connections

Encryption (like 256-bit) makes data unreadable even if stolen. And always use **HTTPS** connections — especially when logging in or paying.

## How Regal Solution helps

Every one of our products includes **256-bit encryption, role-based access control, and daily automatic backups**. So you can focus on your business instead of worrying about data security. See which product fits you — browse [all our solutions](/en/products).
MD,
                'published_at' => '2026-09-15 10:00:00',
                'is_active' => true,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::query()->updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
