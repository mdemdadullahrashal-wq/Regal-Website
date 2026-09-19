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
                'excerpt_bn' => 'ম্যানুয়াল কাজ কমিয়ে কীভাবে ছোট ও মাঝারি ব্যবসা বেশি লাভ করতে পারে।',
                'excerpt_en' => 'How small and medium businesses can boost profit by reducing manual work.',
                'body_bn' => "বাংলাদেশের বেশিরভাগ ব্যবসা এখনো কাগজের খাতা, স্প্রেডশিট আর ম্যানুয়াল প্রক্রিয়ায় চলে। এতে সময় নষ্ট হয়, ভুল হয় এবং সিদ্ধান্ত নিতে দেরি হয়।\n\nঅটোমেশন সফটওয়্যার এই সমস্যার সমাধান। বিলিং, ইনভেন্টরি, HR আর রিপোর্টিং স্বয়ংক্রিয় হলে আপনি প্রতিদিনের অপারেশন থেকে সময় বাঁচিয়ে ব্যবসার বৃদ্ধিতে মন দিতে পারেন।\n\nআমাদের SaaS পণ্যগুলো বিশেষভাবে বাংলাদেশের ব্যবসার জন্য তৈরি — বাংলা ইন্টারফেস, BDT সাপোর্ট এবং স্থানীয় ব্যাংক/মোবাইল ব্যাংকিং ইন্টিগ্রেশনসহ।",
                'body_en' => "Most businesses in Bangladesh still run on paper ledgers, spreadsheets, and manual processes. This wastes time, introduces errors, and delays decisions.\n\nAutomation software solves this. When billing, inventory, HR, and reporting are automated, you free up time from daily operations to focus on growth.\n\nOur SaaS products are built specifically for Bangladeshi businesses — with Bangla interface, BDT support, and local bank/mobile banking integrations.",
                'published_at' => '2026-09-01 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'cloud-vs-desktop-software',
                'title_bn' => 'ক্লাউড বনাম ডেস্কটপ সফটওয়্যার: কোনটা আপনার জন্য?',
                'title_en' => 'Cloud vs Desktop Software: Which Is Right for You?',
                'excerpt_bn' => 'দুই ধরনের সফটওয়্যারের পার্থক্য ও কোন ব্যবসায় কোনটা মানানসই।',
                'excerpt_en' => 'The differences between the two and which suits which business.',
                'body_bn' => "ক্লাউড সফটওয়্যার ইন্টারনেটের মাধ্যমে যেকোনো জায়গা থেকে ব্যবহার করা যায়, অটো-আপডেট হয় এবং ডেটা ব্যাকআপ থাকে। ডেস্কটপ সফটওয়্যার সাধারণত একটা নির্দিষ্ট কম্পিউটারে চলে।\n\nএকাধিক শাখা, রিমোট টিম বা মোবাইল অ্যাক্সেস লাগলে ক্লাউডই সেরা পছন্দ। আর সম্পূর্ণ অফলাইন ও নির্দিষ্ট মেশিনে কাজ করলে ডেস্কটপও কাজের হতে পারে।\n\nআমাদের সব পণ্য ক্লাউড-ভিত্তিক, সাথে অফলাইন-ফার্স্ট ফিচারও আছে।",
                'body_en' => "Cloud software works from anywhere with internet, auto-updates, and backs up data. Desktop software typically runs on a single machine.\n\nIf you need multiple branches, remote teams, or mobile access, cloud is the best choice. Fully offline, single-machine work can suit desktop too.\n\nAll our products are cloud-based with offline-first features as well.",
                'published_at' => '2026-09-05 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'sme-digitization-roadmap',
                'title_bn' => 'SME ডিজিটালাইজেশনের সহজ রোডম্যাপ',
                'title_en' => 'A Simple Roadmap to SME Digitization',
                'excerpt_bn' => 'ছোট ব্যবসা কীভাবে ধাপে ধাপে ডিজিটাল হতে পারে।',
                'excerpt_en' => 'How small businesses can go digital step by step.',
                'body_bn' => "ধাপ ১: বিলিং অটোমেট করুন। ধাপ ২: ইনভেন্টরি ও স্টক ট্র্যাক করুন। ধাপ ৩: রিপোর্টিং চালু করুন। ধাপ ৪: CRM দিয়ে গ্রাহক সম্পর্ক ম্যানেজ করুন।\n\nপ্রতিটি ধাপে আমাদের আলাদা পণ্য আছে যা পরস্পরের সাথে যুক্ত। ছোট শুরু করুন, ধীরে ধীরে বড় করুন।",
                'body_en' => "Step 1: Automate billing. Step 2: Track inventory and stock. Step 3: Enable reporting. Step 4: Manage customer relationships with CRM.\n\nEach step has its own Regal product, all interconnected. Start small and scale gradually.",
                'published_at' => '2026-09-10 10:00:00',
                'is_active' => true,
            ],
            [
                'slug' => 'data-security-basics',
                'title_bn' => 'ব্যবসার ডেটা নিরাপদ রাখার মৌলিক নিয়ম',
                'title_en' => 'Basic Rules to Keep Your Business Data Safe',
                'excerpt_bn' => 'পাসওয়ার্ড, ব্যাকআপ ও অ্যাক্সেস কন্ট্রোলের গুরুত্ব।',
                'excerpt_en' => 'The importance of passwords, backups, and access control.',
                'body_bn' => "শক্তিশালী পাসওয়ার্ড ব্যবহার করুন, নিয়মিত ব্যাকআপ নিন এবং কে কী ডেটা দেখতে পারবে তা নিয়ন্ত্রণ করুন।\n\nআমাদের পণ্যে ২৫৬-বিট এনক্রিপশন, রোল-ভিত্তিক অ্যাক্সেস এবং দৈনিক অটো-ব্যাকআপ রয়েছে।",
                'body_en' => "Use strong passwords, back up regularly, and control who can see what data.\n\nOur products feature 256-bit encryption, role-based access, and daily automated backups.",
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
